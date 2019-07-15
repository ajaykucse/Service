@extends('layouts.back-end.master')
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{ url('/admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{ url('/cart') }}" class="tip-bottom">order</a></div>
  <h1>DELIVERY ADDRESS</h1>
</div>
<div class="container-fluid">
{!! Form::open(array('url'=>'/checkout','method'=>'POST','class'=>'form-horizontal','files'=>true)) !!}
{{ csrf_field() }}
  <hr>
  <div class="row-fluid">
  		
  	<!-- <form action="{{ url('/checkout') }}" method="post">  -->
  		
    <div class="span6 pull-left">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Bill To</h5>
        </div>
        <div class="widget-content nopadding">
        	 
            <div class="control-group">
              <label class="control-label">Company Name:</label>
              <div class="controls">
                <input name="cust_desc" id="cust_desc" @if(!empty($userDetails->Description)) value="{{ $userDetails->Description }}" @endif type="text" class="span11" placeholder="Billing Name" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">City:</label>
              <div class="controls">
                <input name="cust_city" id="cust_city" @if(!empty($userDetails->City)) value="{{ $userDetails->City }}" @endif type="text" class="span11" placeholder="Billing City" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Country:</label>
              <div class="controls">
                <input name="cust_country" id="cust_country" @if(!empty($userDetails->Country)) value="{{ $userDetails->Country }}" @endif type="text"  class="span11" placeholder="Billing Country:"  />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Mobile:</label>
              <div class="controls">
                <input name="cust_moblie" id="cust_mobile" @if(!empty($userDetails->MobileNo)) value="{{ $userDetails->MobileNo }}" @endif type="text" class="span11" placeholder="Billing Mobile" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Email:</label>
              <div class="controls">
                <input name="cust_email" id="cust_email" @if(!empty($userDetails->Email)) value="{{ $userDetails->Email }}" @endif type="text" class="span11" placeholder="Billing Address" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Address:</label>
              <div class="controls">
                <input name="cust_address" id="cust_address" @if(!empty($userDetails->Address1)) value="{{ $userDetails->Address1 }}" @endif type="text" class="span11" placeholder="Billing Address" />
              </div>
            </div>
             <div class="control-group">
              <label class="control-label">Region:</label>
              <div class="controls">
                <input name="cust_region" id="cust_region" @if(!empty($userDetails->Region)) value="{{ $userDetails->Region }}" @endif type="text" class="span11" placeholder="Billing Region" />
               </div>
            </div>
            <div class="control-group">
              <label class="control-label">FaxNo</label>
              <div class="controls">
                <input name="cust_fax" id="cust_fax" @if(!empty($userDetails->FaxNo)) value="{{ $userDetails->FaxNo }}" @endif type="text" class="span11" placeholder="Billing FaxNo" />
              </div>
            </div>
            <div class="control-group">
            	 <label class="control-label" for="copyAddress">Both are same Address</label>
            	<div class="controls">
            		<input type="checkbox" id="copyAddress" style="opacity: 0;">	
              	</div>
             </div> 
             
        </div>
      </div>
    </div>
    <div class="span6 pull-right">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Ship To</h5>
        </div>
        <div class="widget-content nopadding">
            
            <div class="control-group">
              <label class="control-label">Company Name:</label>
              <div class="controls">
                <input name="cust_ship" id="cust_ship_desc" type="text" @if(!empty($shippingDetails->name)) value="{{ $shippingDetails->name }}" @endif class="span11" placeholder="Shipping Name" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">City:</label>
              <div class="controls">
                <input name="cust_ship_city" id="cust_ship_city" type="text" @if(!empty($shippingDetails->city)) value="{{ $shippingDetails->city }}" @endif class="span11" placeholder="Shipping City" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Country:</label>
              <div class="controls">
                <input name="cust_ship_country" id="cust_ship_country" @if(!empty($shippingDetails->country)) type="text" value="{{ $shippingDetails->country }}" @endif class="span11" placeholder="Shipping Country:"  />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Mobile:</label>
              <div class="controls">
                <input name="cust_ship_mobile" id="cust_ship_mobile" type="text" @if(!empty($shippingDetails->mobile)) value="{{ $shippingDetails->mobile }}" @endif class="span11" placeholder="Shipping Mobile" />
              </div>
            </div>
            <div class="control-group">
             	<label class="control-label">Email:</label>
              <div class="controls">
                <input name="cust_ship_email" id="cust_ship_email" type="text" @if(!empty($shippingDetails->email)) value="{{ $shippingDetails->email }}" @endif class="span11" placeholder="Billing Address" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Address:</label>
              <div class="controls">
                <input name="cust_ship_address" id="cust_ship_address" type="text" @if(!empty($shippingDetails->address)) value="{{ $shippingDetails->address }}" @endif class="span11" placeholder="Shipping Address" />
              </div>
            </div>
             <div class="control-group">
              <label class="control-label">Region:</label>
              <div class="controls">
                <input name="cust_ship_region" id="cust_ship_region" type="text" @if(!empty($shippingDetails->region)) value="{{ $shippingDetails->region }}" @endif class="span11" placeholder="Shipping State" />
               </div>
            </div>
            <div class="control-group">
              <label class="control-label">FaxNo:</label>
              <div class="controls">
                <input name="cust_ship_fax" id="cust_ship_fax" type="text" @if(!empty($shippingDetails->fax)) value="{{ $shippingDetails->fax }}" @endif class="span11" placeholder="Shipping FaxNo" />
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-warning pull-right">Checkout</button>
            </div>
           
        </div>
      </div>
    </div>
    
    <!-- </form> -->
  </div>
 {!! Form::close() !!}
</div></div>
 
@endsection