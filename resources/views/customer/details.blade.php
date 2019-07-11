@extends('layouts.back-end.master')
@section('content')
  
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{ url('/admin/product-list')}}" class="current">Product</a> </div>
    <h1>Product Item</h1>
  </div>
  <div class="container-fluid">
    <hr>
<form name="addTocartForm" id="addTocartForm" method="post" action="{{ url('/add-cart') }}">
  {{ csrf_field() }}
  <div class="widget-box">
    <input type="hidden" name="product_code" value="{{ $productDetails->Code }}">
    <input type="hidden" name="product_desc" value="{{ $productDetails->Description }}">
    <input type="hidden" name="product_price" value="{{ $productDetails->SalesRate }}">
  <h4>{{ $productDetails->Description }}</h4>
  <p>Code: {{ $productDetails->Code }}</p>
    <span class="input-box"> Quantity: 
    <input type="text" name="quantity" value="1" class="span2 m-wrap">  
    </span>
  <p>
  <span class="input-box">
  In Stock..: 
  <input type="text" name="cust_stock" value="1" class="span2 m-wrap">
     <button type="submit" class="btn btn-warning btn">
      <i class="icon-shopping-cart"></i> Add to cart
    </button>
  </p>
  </div>
</form>
</div>
</div>
@endsection