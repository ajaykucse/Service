@extends('layouts.back-end.master')
@section('content')
 <div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{ url('/admin/product-list')}}" class="current">Orders</a> </div>
    <h1>Order iTEMS</h1>
  </div>
  <div class="container-fluid">
  	<hr>
     <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>iTEMS</h5>
          </div>
	<div class="widget-content nopadding">
		<table class="table table-bordered data-table">
			<thead>
				<tr class="cart_menu">
					<td class="image">SN.</td>
					<td class="description">Products</td>
					<td class="price">Price</td>
					<td class="quantity">Quantity</td>
					<td class="total">Total</td>
					<td class="action">Action</td>
				</tr>
			</thead>
			<tbody>
				@php $no = 1; $total_amount=0; @endphp
				@foreach($useCart as $cart)
				<tr>
					<td class="cart_product">
						<span> {{ $no++ }} </span>
					</td>
					<td class="cart_description">
						<h5><a href="">{{ $cart->product_desc }}</a></h5>
						<p>{{ $cart->product_code }}</p>
					</td>
					<td class="cart_price">
						<p>Rs. {{ number_format($cart->price, 2, '.', ',') }}</p>
					</td>
					<td class="cart_quantity">
						 
						<a class="btn btn-warning btn-mini" href="{{ url('/cart/update-quantity/'.$cart->id.'/1') }}"> + </a>
						<input class="span1 m-wrap" type="text" name="quantity" value="{{ $cart->quantity }}" autocomplete="off" size="2">
						@if($cart->quantity>1)
						<a class="btn btn-warning btn-mini" href="{{ url('/cart/update-quantity/'.$cart->id.'/-1') }}"> - </a>
						@endif
					</td>
					<td class="cart_total">
						<p class="cart_total_price">Rs. {{ $cart->price*$cart->quantity }}</p>
					</td>
					<td class="cart_total">
						<a href="{{ url('cart/delete-product/'.$cart->id)}}" class="btn btn-warning btn" data-original-title="Remove"><i class="icon-remove"></i></a>
					</td>
				</tr>
				@php $total_amount = $total_amount + ($cart->price*$cart->quantity); @endphp
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<div class="heading">
	<h3>What would you like to do next?</h3>
 
</div>
<table class="table table-bordered table-invoice-full">
  <tbody>
    <tr>
      <td class="msg-invoice" width="85%"><h4>Payment method: </h4>
        <a href="#" class="tip-bottom" title="Wire Transfer">Wire transfer</a> |  <a href="#" class="tip-bottom" title="Bank account">Bank account #</a> |  <a href="#" class="tip-bottom" title="SWIFT code">SWIFT code </a>|  <a href="#" class="tip-bottom" title="IBAN Billing address">IBAN Billing address </a></td>
      <td class="right"><strong>Total Amt.</strong> <br>
      <td class="right"><strong>Rs. {{$total_amount}} <br>
    </tr>
  </tbody>
</table>
<div class="pull-right">
  <a class="btn btn-primary btn-large pull-right" href="">Pay Invoice</a> 
</div>
</div>
</div>
@endsection