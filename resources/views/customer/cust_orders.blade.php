@extends('layouts.back-end.master')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('/admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{ url('/order-review') }}" class="current">Order</a> </div>
    <h1>ORDER iTEMS</h1>
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
                  <th>Ordered Products</th>
                  <th>Payment Method</th>
                  <th>Total Amount</th>
                  <th>Created on</th>

                </tr>
              </thead>
              <tbody>
                @foreach($orderPlace as $order)
                <tr class="odd gradeX">
                  <td><span> {{ $no++ }} </span></td>
                  <td>
                    @foreach($order->placeOrders as $pro)
                    <a href="{{ url('cust-orders/'.$order->id)}}">{{ $pro->product_code }}</a><br>
                    @endforeach
                  </td>
                  <td>{{ $order->payment_method }}</td>
                  <td>Rs. {{ number_format($order->total_amount, 2, '.', ',') }}</td>
                  <td>{{ $order->created_at }}</td>

                </tr>
                @endforeach   
              </tbody>
            </table>
          </div>
        </div>
  </div>
</div>

@endsection