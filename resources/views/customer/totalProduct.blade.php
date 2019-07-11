@extends('layouts.back-end.master')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Product</a> </div>
    <h1>Product Items</h1>
  </div>
  <div class="container-fluid">
    <hr>
     <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Product Order</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
               <thead>
                <tr>
                  <th>Code</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($listing as $list)
                <tr class="odd gradeX">
                  <td>{{ $list->Code }}</td>
                  <td>{{ $list->Description }}</td>
                    <td class="center">
                    <a href="{{ url('/admin/product/'.$list->Code) }}" type="button" class="btn btn-warning btn-mini"><i class="icon-shopping-cart"></i> Order</a> 
                  </td>
                </tr>
             @endforeach   
              </tbody>
            </table>
          </div>
        </div>
  </div>
</div>

@endsection