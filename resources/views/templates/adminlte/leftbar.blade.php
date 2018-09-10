<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">

            <img src="{{$imgUrl}}/files/@if(Auth::check()){{ Auth::user()->images}}@endif" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>Phong Lưu</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li>
            <a href="{{route('admin.statistical.index')}}">
                <i class="fa fa-th"></i> <span>Thống kê</span>
                <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
            </a>
        </li>

        <li class="treeview">
            <a href="#">
                <i class="fa fa-table"></i> <span>QL Sản phẩm</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{route('admin.products.index')}}"><i class="fa fa-circle-o"></i>Sản phẩm</a></li>
                <li><a href="{{route('admin.typeproducts.index')}}"><i class="fa fa-circle-o"></i> Loại</a></li>
                <li class="active"><a href="{{route('admin.producer.index')}}"><i class="fa fa-circle-o"></i> Danh mục</a></li>
            </ul>
        </li>
        <li><a href="{{route('admin.review.index')}}"><i class="fa fa-book"></i> <span>QL Bình luận</span></a></li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-user-plus"></i> <span>QL Users</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{route('admin.user.index')}}"><i class="fa fa-circle-o"></i> Users</a></li>
                <li>
                    <a href="{{route('admin.account.account')}}"><i class="fa fa-circle-o"></i> Account
                        <span class="pull-right-container">
                  {{--<i class="fa fa-angle-left pull-right"></i>--}}
                </span>
                    </a>
                    {{--<ul class="treeview-menu">--}}
                    {{--<li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>--}}
                    {{--<li class="treeview">--}}
                    {{--<a href="#"><i class="fa fa-circle-o"></i> Level Two--}}
                    {{--<span class="pull-right-container">--}}
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    {{--</span>--}}
                    {{--</a>--}}
                    {{--<ul class="treeview-menu">--}}
                    {{--<li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>--}}
                    {{--<li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>--}}
                    {{--</ul>--}}
                    {{--</li>--}}
                    {{--</ul>--}}
                </li>

            </ul>
        </li>
        <li>
            <a href="{{route('admin.orders.index')}}">
                <i class="fa fa-calendar"></i> <span>Đơn hàng</span>
                {{--<span class="pull-right-container">--}}
              {{--<small class="label pull-right bg-red">3</small>--}}
              {{--<small class="label pull-right bg-blue">17</small>--}}
            {{--</span>--}}
            </a>
        </li>
        <li>
            <a href="../mailbox/mailbox.html">
                <i class="fa fa-envelope"></i> <span>Mailbox</span>
                <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
            </a>
        </li>
        <!-- <li class="treeview">
            <a href="#">
                <i class="fa fa-folder"></i> <span>Examples</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="../examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
                <li><a href="../examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
                <li><a href="../examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
                <li><a href="../examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
                <li><a href="../examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
                <li><a href="../examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
                <li><a href="../examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
                <li><a href="../examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
                <li><a href="../examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
            </ul>
        </li>


        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> -->
    </ul>
</section>
<!-- /.sidebar -->
</aside>