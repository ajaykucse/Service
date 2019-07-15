<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\DeliveryAddress;
use App\placeOrder;
use App\placeOrderProduct;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data = $request->input();
            $customer = DB::table('tblCustomer')
            ->where('Code',$request->input('code'))
            ->where('Code',$request->input('password'))
            ->first();
        if($customer)
        {
            Session::put('customerSession',$data['code']);
            $cust_code = Session::get('customerSession');
                $notification = array(
                    'message' => 'I have logged in successfully.', 
                    'alert-type' => 'info'
                );
            return redirect('/admin/dashboard')->with($notification);
        }else{
            $notification = array(
                    'message' => 'Invalid Username or Password.', 
                    'alert-type' => 'error'
                );
                return redirect('/admin')->with($notification);
        }
        }
        return view('admin.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Session::has('customerSession'))
        {
            
        }else{
            return redirect('/admin')->with('message','Please login to access');
        }
            $cust_code = Session::get('customerSession');
            $totalOrders = DB::table('orders')->where(['cust_code'=>$cust_code])->count();
            $orders = DB::table('placeOrder_products')->where(['cust_code'=>$cust_code])->count();
            $product = DB::table('tblProduct')->count();
            return view('admin.dashboard',compact('product','totalOrders','orders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Session::has('customerSession'))
        {
            
        }else{
            $notification = array(
                    'message' => 'Please login to access.', 
                    'alert-type' => 'error'
                );
            return redirect('/admin')->with($notification);
        }
         DB::table('orders')->where('id',$id)->delete();
         return redirect('cart')->with('message','Product has been deleted from carty.');
    }
    public function list()
    {
        if(Session::has('customerSession'))
        {
            
        }else{
            $notification = array(
                    'message' => 'Please login to access.', 
                    'alert-type' => 'error'
                );
            return redirect('/admin')->with($notification);
        }
        $listing = DB::table('tblProduct')->get();
        return view('customer.totalProduct',compact('listing'));
    }
    public function logout()
    {
         Session::flush();
          $notification = array(
                    'message' => 'Logged out Successfully.', 
                    'alert-type' => 'info'
                );
         return redirect('/admin')->with($notification);
    }
    public function product($Code=null)
    {
        if(Session::has('customerSession'))
        {
            
        }else{
            $notification = array(
                    'message' => 'Please login to access.', 
                    'alert-type' => 'error'
                );
            return redirect('/admin')->with($notification);
        }
        $productDetails = DB::table('tblProduct')
                            ->where('Code',$Code)
                            ->first();
        return view('customer.details')->with(compact('productDetails'));
    }
    public function addtocart(Request $request, $id=null)
    {
        if(Session::has('customerSession'))
        {
            
        }else{
            $notification = array(
                    'message' => 'Please login to access.', 
                    'alert-type' => 'error'
                );
            return redirect('/admin')->with($notification);
        }

        $cust_code = Session::get('customerSession');
        
        $product_code = $request->input('product_code');
        $product_desc = $request->input('product_desc');
        $price = $request->input('product_price');
        $quantity = $request->input('quantity');
        $cust_stock = $request->input('cust_stock');

        $countProducts = DB::table('orders')->where(['product_code'=>$product_code,"cust_code"=>$cust_code])->count();

        if($countProducts>0){
             $notification = array(
                    'message' => 'Product already exists in cart.', 
                    'alert-type' => 'error'
                );
            return redirect()->back()->with($notification);
        }else{

             $data = array('product_code'=>$product_code,"product_desc"=>$product_desc,"price"=>$price,"quantity"=>$quantity,"cust_code"=>$cust_code,"cust_stock"=>$cust_stock,"created_at" =>  \Carbon\Carbon::now(),"updated_at" => \Carbon\Carbon::now());
        
            DB::table('orders')->insert($data);
        }

        return redirect('/cart')->with('message','Product has been added to your cart!');
    }
    public function cart()
    {
        if(Session::has('customerSession'))
        {
            
        }else{
            $notification = array(
                    'message' => 'Please login to access.', 
                    'alert-type' => 'error'
                );
            return redirect('/admin')->with($notification);
        }
        $cust_code = Session::get('customerSession');
        $useCart = DB::table('orders')->where(['cust_code'=>$cust_code])->get();
        return view('customer.cart')->with(compact('useCart'));
    }
    public function updateCartQuantity($id=null,$quantity=null)
    {
        if(Session::has('customerSession'))
        {
            
        }else{
            $notification = array(
                    'message' => 'Please login to access.', 
                    'alert-type' => 'error'
                );
            return redirect('/admin')->with($notification);
        }
        DB::table('orders')->where('id',$id)->increment('quantity',$quantity);
        return redirect('cart')->with('message','Product Quantity has been updated.');
    }
    public function checkout(Request $request)
    {
        if(Session::has('customerSession'))
        {
            
        }else{
            $notification = array(
                    'message' => 'Please login to access.', 
                    'alert-type' => 'error'
                );
            return redirect('/admin')->with($notification);
        }
        $cust_code = Session::get('customerSession');
        $shippingCount = DeliveryAddress::where('cust_code',$cust_code)->count();
        $shippingDetails = array();
        if($shippingCount>0)
        {
            $shippingDetails = DeliveryAddress::where('cust_code',$cust_code)->first();
        }
        if($request->isMethod('post'))
        {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            //Return to checkout page if any of the field is empty
            if(empty($data['cust_desc']) || 
                empty($data['cust_city']) || 
                empty($data['cust_country']) || 
                empty($data['cust_moblie']) || 
                empty($data['cust_email']) || 
                empty($data['cust_address']) || 
                empty($data['cust_region']) || 
                empty($data['cust_fax']) ||
                empty($data['cust_ship']) ||
                empty($data['cust_ship_city']) ||
                empty($data['cust_ship_country']) ||
                empty($data['cust_ship_mobile']) ||
                empty($data['cust_ship_email']) ||
                empty($data['cust_ship_address']) ||
                empty($data['cust_ship_region']) ||
                empty($data['cust_ship_fax'])){
                return redirect()->back()->with('message','Please fill all the field to Continue.');
            }
            //Update Customer details 
            DB::table('tblCustomer')
            ->where('Code',$cust_code)
            ->update(['Description'=>$data['cust_desc'],'City'=>$data['cust_city'],'Country'=>$data['cust_country'],'MobileNo'=>$data['cust_moblie'],'Email'=>$data['cust_email'],'Address1'=>$data['cust_address'],'Region'=>$data['cust_region'],'FaxNo'=>$data['cust_fax']]);

            if($shippingCount>0)
            {
                //Update Shipping Address
                 DeliveryAddress::where('cust_code',$cust_code)
                 ->update(['name'=>$data['cust_ship'],'city'=>$data['cust_ship_city'],'country'=>$data['cust_ship_country'],'mobile'=>$data['cust_ship_mobile'],'email'=>$data['cust_ship_email'],'address'=>$data['cust_ship_address'],'region'=>$data['cust_ship_region'],'fax'=>$data['cust_ship_fax']]);
            }else{
                    //Insert New Shipping Address
                    $shipping = new DeliveryAddress;
                    $shipping->cust_code = $cust_code;
                    $shipping->name = $data['cust_ship'];
                    $shipping->email = $data['cust_ship_email'];
                    $shipping->address = $data['cust_ship_address'];
                    $shipping->city = $data['cust_ship_city'];
                    $shipping->region = $data['cust_ship_region'];
                    $shipping->country = $data['cust_ship_country'];
                    $shipping->fax = $data['cust_ship_fax'];
                    $shipping->mobile = $data['cust_ship_mobile'];
                    $shipping->save();
                }
                return redirect()->action('AdminController@orderReview');
        }
        
        $userDetails = DB::table('tblCustomer')->where('Code',$cust_code)->first();
        return view('customer.checkout')->with(compact('userDetails','shippingDetails'));
    }
    public function orderReview()
    {   if(Session::has('customerSession'))
        {
            
        }else{
            $notification = array(
                    'message' => 'Please login to access.', 
                    'alert-type' => 'error'
                );
            return redirect('/admin')->with($notification);
        }
        $cust_code = Session::get('customerSession');
        //$userDetails = DB::table('tblCustomer')->where('Code',$cust_code)->first();
        $shippingDetails = DeliveryAddress::where('cust_code',$cust_code)->first();
        $useCart = DB::table('orders')->where(['cust_code'=>$cust_code])->get();
        return view('customer.orderReview')->with(compact('shippingDetails','useCart'));
    }
    public function placeOrder(Request $request)
    {
        if(Session::has('customerSession'))
        {
            
        }else{
            $notification = array(
                    'message' => 'Please login to access.', 
                    'alert-type' => 'error'
                );
            return redirect('/admin')->with($notification);
        }
        if ($request->isMethod('post')) 
        {
            $data = $request->all();
            $cust_code = Session::get('customerSession');

            $shippingDetails = DeliveryAddress::where('cust_code',$cust_code)->first();

            $placeOrder = new placeOrder;
            $placeOrder->cust_code = $shippingDetails->cust_code;
            $placeOrder->name = $shippingDetails->name;
            $placeOrder->email = $shippingDetails->email;
            $placeOrder->address = $shippingDetails->address;
            $placeOrder->city = $shippingDetails->city;
            $placeOrder->region = $shippingDetails->region;
            $placeOrder->country = $shippingDetails->country;
            $placeOrder->fax = $shippingDetails->fax;
            $placeOrder->mobile = $shippingDetails->mobile;
            $placeOrder->order_status = "1";
            $placeOrder->payment_method = $data["payment_method"];
            $placeOrder->total_amount = $data["total_amount"];
            $placeOrder->save();

            $placeOrder_id = DB::getPdo()->lastInsertId();

            $orderProducts = DB::table('orders')->where(['cust_code'=>$cust_code])->get();
            foreach ($orderProducts as $pro) {
                $orderPro = new placeOrderProduct;
                $orderPro->placeOrder_id = $placeOrder_id;
                $orderPro->cust_code = $cust_code;
                $orderPro->product_code = $pro->product_code;
                $orderPro->product_desc = $pro->product_desc;
                $orderPro->product_price = $pro->price;
                $orderPro->quantity = $pro->quantity;
                $orderPro->save();
            }
            Session::put('placeOrder_id',$placeOrder_id);
            Session::put('total_amount',$data["total_amount"]);
            //Redirect user to thanks page after saving order 
            return redirect('/thanks');
        }
    }
    public function thanks(Request $request)
    {   if(Session::has('customerSession'))
        {
            
        }else{
            $notification = array(
                    'message' => 'Please login to access.', 
                    'alert-type' => 'error'
                );
            return redirect('/admin')->with($notification);
        }
        $cust_code = Session::get('customerSession');
        DB::table('orders')->where('cust_code',$cust_code)->delete();
        return view('customer.thanks');
    }
    public function custOrders()
    {
        $cust_code = Session::get('customerSession');

        $orderPlace = placeOrder::with('placeOrders')->where('cust_code',$cust_code)->orderBy('id', 'DESC')->get();

        // $orderPlace = json_decode(json_encode($orderPlace));
        // echo "<pre>"; print_r($orderPlace); die;
        return view('customer.cust_orders')->with(compact('orderPlace'));
    }
    public function custOrderDetails($placeOrder_id)
    {
        $cust_code = Session::get('customerSession');
        $orderDetails = placeOrder::with('placeOrders')->where('id',$placeOrder_id)->first();
        // $orders = json_decode(json_encode($orders));
        // echo "<pre>"; print_r($orders); die;
        return view('customer.cust_order_details')->with(compact('orderDetails'));
    }
}
