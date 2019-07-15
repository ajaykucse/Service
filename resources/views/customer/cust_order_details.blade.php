@extends('layouts.back-end.master')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('/admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{ url('/cust-orders') }}" class="current">Order</a> </div>
    <h1><a href="{{ url('/cust-orders') }}">ORDERS</a></h1>
    <label class=" label label-warning" style="margin-left:130px;">{{ $orderDetails->id }} </label>
  </div>
  <div class="container-fluid">
    <hr>
     <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Order List</h5>
          </div>
          @php $no = 1; @endphp
          <div class="widget-content nopadding">
            <table class="table table-bordered">
               <thead>
                <tr>
                  <th>SN.</th>
                  <th>Product Code</th>
                  <th>Product Name</th>
                  <th>Product Price</th>
                  <th>Product Qty.</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach($orderDetails->placeOrders as $order)
                <tr class="odd gradeX">
                  <td><span> {{ $no++ }} </span></td>
                  <td>{{ $order->product_code }}</td>
                  <td>{{ $order->product_desc }}</td>
                  <td>Rs. {{ number_format($order->product_price, 2, '.', ',') }}</td>
                  <td>{{ $order->quantity }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
  </div>
</div>

@endsection