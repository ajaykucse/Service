@extends('layouts.back-end.master')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb">
    	<a href="{{ url('/admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a>
    	<a href="{{ url('/admin/product-list')}}" class="current">Thanks</a>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Thanks</h5>
          </div>
          <div class="widget-content">
            <div class="error_ex">
              <h1 style="font-size:70pt;">Thanks</h1>
              <h4>YOUR ORDER HAS BEEN PLACED</h4>
              <p>Your order number is {{ Session::get('placeOrder_id') }} and total payable about is Rs. {{ Session::get('total_amount') }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection

<?php 
Session::forget('placeOrder_id');
Session::forget('total_amount');
?>