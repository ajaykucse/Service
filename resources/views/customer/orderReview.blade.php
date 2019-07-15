@extends('layouts.back-end.master')
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{ url('/admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{ url('/cart') }}" class="tip-bottom">Cart</a></div>
  <h1>REVIEW & PAYMENT</h1>
  <hr>
 </div>
 <br>
<div id="content-header">

      <div class="container-fluid">

     <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>iTEMS</h5>
          </div>
	<div class="widget-content nopadding">
		<table class="table table-bordered">
			<thead>
				<tr class="cart_menu">
					<td class="image">SN.</td>
					<td class="description">Products</td>
					<td class="quantity">Quantity</td>
					<td class="price">Price</td>
					<td class="total">Amount</td>
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
						 
						<p> {{ $cart->quantity }} </p>
					</td>
					<td class="cart_price">
						<p>Rs. {{ number_format($cart->price, 2, '.', ',') }}</p>
					</td>
					<td class="cart_total">
						<p class="cart_total_price">Rs. {{ $cart->price*$cart->quantity }}</p>
					</td>
				</tr>
				@php $total_amount = $total_amount + ($cart->price*$cart->quantity); @endphp
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<span class="warning" style="margin-bottom:100px;">
	<h5>What would you like to do next?</h5>
</span>
<form name="PaymentForm" id="PaymentForm" action="{{ url('/place-order') }}" method="post"> {{ csrf_field() }}
<table class="table table-bordered table-invoice-full">
  <tbody>
    <tr>
    <td class="msg-invoice" width="40%"><h4>Payment method: </h4>
        <a href="#" class="tip-bottom" title="Wire Transfer">Wire transfer</a> |  <a href="#" class="tip-bottom" title="Bank account">Bank account #</a> |  <a href="#" class="tip-bottom" title="SWIFT code">SWIFT code </a>|  <a href="#" class="tip-bottom" title="IBAN Billing address">IBAN Billing address </a>
    </td>
    
    	<label id="spm"  style="margin-left:560px;">
            <strong>Select Order Type</strong>
        </label>
    <td class="msg-invoice" width="19%">
       	<label>
            <div class="radio" id="uniform-undefined">
               	<span><input type="radio" name="payment_method" id="Bank" value="Argent" style="opacity: 0;"></span>
            </div>
            <strong>Argent</strong>
        </label>
    </td>
    <td class="msg-invoice" width="15%">
       	<label>
            <div class="radio" id="uniform-undefined">
               	<span><input type="radio" name="payment_method" id="Cheque" value="Normal" style="opacity: 0;"></span>
            </div>
            <strong>Normal</strong>
        </label>
    </td>
    <input type="hidden" name="total_amount" value="{{$total_amount}}">
    <td class="right" width="11%"><strong class="pull-right">Total Amount =</strong></td>
      <td class="right" width="15%"><strong class="pull-right"><p class="text-success">Rs. {{ $total_amount }}/- </p></strong></td>
    </tr>
  </tbody>
</table>
<div class="pull-right">
  <button type="submit" class="btn btn-primary btn pull-right" id="Invoice"  onclick="return selectPaymentMethod();">Pay Invoice</button>
</div>
</form>
</div>
</div>
 </div>
 
@endsection