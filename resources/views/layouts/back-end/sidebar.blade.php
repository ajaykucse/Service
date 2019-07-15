<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="active"><a href="{{ url('/admin/dashboard') }}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>

    <li class="submenu"> 
      <a href="#"><i class="icon icon-th-list"></i> 
      <span>Product</span> <span class="label label-important">1</span>
    </a>

      <ul>
        <li><a href="{{ url('/admin/product-list') }}">View</a></li>
      </ul>

    </li>
    <li class="submenu"> 
      <a href="#"><i class="icon icon-th-list"></i> 
      <span>Cart</span> <span class="label label-important">1</span>
    </a>
      <ul>
        <li><a href="{{ url('/cart') }}">View</a></li>
      </ul>
    </li>
    <li class="submenu"> 
      <a href="#"><i class="icon icon-th-list"></i> 
      <span>Order</span> <span class="label label-important">1</span>
    </a>

      <ul>
        <li><a href="{{ url('/cust-orders') }}">View</a></li>
      </ul>
    </li>
  </ul>
</div>
<!--sidebar-menu-->