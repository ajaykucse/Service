<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
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
            return redirect('/admin/dashboard')->with('message','I have logged in successfully');
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
            $product = DB::table('tblProduct')->count();
            return view('admin.dashboard',compact('product','totalOrders'));
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
         DB::table('orders')->where('id',$id)->delete();
         return redirect('cart')->with('message','Product has been deleted from carty.');
    }
    public function list(){
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
        $productDetails = DB::table('tblProduct')
                            ->where('Code',$Code)
                            ->first();
        return view('customer.details')->with(compact('productDetails'));
    }
    public function addtocart(Request $request, $id=null)
    {
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
        $cust_code = Session::get('customerSession');
        $useCart = DB::table('orders')->where(['cust_code'=>$cust_code])->get();
        return view('customer.cart')->with(compact('useCart'));
    }
    public function updateCartQuantity($id=null,$quantity=null)
    {
        DB::table('orders')->where('id',$id)->increment('quantity',$quantity);
        return redirect('cart')->with('message','Product Quantity has been updated.');
    }
}
