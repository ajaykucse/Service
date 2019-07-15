@extends('layouts.back-end.master')
@section('content')
 <div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('/admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{ url('/admin/product-list')}}" class="current">Product</a> </div>
    <h1>CART iTEMS</h1>
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
					
					<td class="quantity">Quantity</td>
					<td class="price">Price</td>
					<td class="total">Amount</td>
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
						<h6><a href="">{{ $cart->product_desc }}</a></h6>
						<p>{{ $cart->product_code }}</p>
					</td>

					<td class="cart_quantity">

						<a class="btn btn-warning btn-mini" href="{{ url('/cart/update-quantity/'.$cart->id.'/1') }}"> + </a>
						<input class="span1 m-wrap" type="text" name="quantity" value="{{ $cart->quantity }}" autocomplete="off" size="2">
						@if($cart->quantity>1)
						<a class="btn btn-warning btn-mini" href="{{ url('/cart/update-quantity/'.$cart->id.'/-1') }}"> - </a>
						@endif
					</td>
					<td class="cart_price">
						<p>Rs. {{ number_format($cart->price, 2, '.', ',') }}</p>
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

<table class="table table-bordered table-invoice pull-right">
  <tbody>
    <tr>
      <td class="right" width="75%"></td>
      <td class="right" width="10%"><strong class="pull-right">Total Amount</strong></td>
      <td class="right" width="15%"><strong class="pull-right">Rs. {{ $total_amount }}/- </strong></td>
    </tr>
  </tbody>
</table>
<div class="pull-right">
  <a class="btn btn-primary btn-warning pull-right" href="{{ url('/order-review') }}">Checkout</a> 
</div>
</div>
</div>
@endsection