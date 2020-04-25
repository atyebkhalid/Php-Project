<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ url('resources/admin') }}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Session::get('AdminName') }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li><a href="{{ url('admin/categories') }}"><i class="fa fa-list"></i> <span>Categories</span></a></li>
            <li><a href="{{ url('admin/products') }}"><i class="fa fa-list"></i> <span>Products</span></a></li>
            <li><a href="{{ url('admin/orders') }}"><i class="fa fa-cart-arrow-down"></i> <span>Orders</span></a></li>
            <li><a href="{{ url('admin/order_details') }}"><i class="fa fa-cart-plus"></i> <span>Order Details</span></a></li>
            <li><a href="{{ url('admin/logout') }}"><i class="fa fa-power-off"></i> <span>Logout</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>