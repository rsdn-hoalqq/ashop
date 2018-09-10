<div id="leftSide">
    <div class="logo"><a href="{{route('admin.index.index')}}"><img src="{{$adminUrl}}/images/logo.png" alt="" /></a></div>

    <div class="sidebarSep mt0"></div>

    <!-- Search widget -->
    <form action="" class="sidebarSearch">
        <input type="text" name="search" placeholder="search..." id="ac" />
        <input type="submit" value="" />
    </form>

    <div class="sidebarSep"></div>

    <!-- General balance widget -->
    <div class="genBalance">
        <a href="#" title="" class="amount">
            <span>General balance:</span>
            <span class="balanceAmount">
                @if(isset( $_SESSION['gia']))
                    @php

                        echo number_format( $_SESSION['gia'],'0',',','.');
                    @endphp
                    @endif
            </span>
        </a>
        <a href="#" title="" class="amChanges">
            <strong class="sPositive">+0.6%</strong>
        </a>
    </div>

    <!-- Next update progress widget -->
    <div class="nextUpdate">
        <ul>
            <li>Next update in:</li>
            <li>23 hrs 14 min</li>
        </ul>
        <div class="pWrapper"><div class="progressG" title="78%"></div></div>
    </div>

    <div class="sidebarSep"></div>

    <!-- Left navigation -->
    <ul id="menu" class="nav">
        <li class="dash"><a href="{{route('admin.index.index')}}" title=""><span>Trang chủ</span></a></li>
        {{--<li class="charts"><a href="charts.html" title=""><span>Statistics and charts</span></a></li>--}}
        {{--<li class="forms"><a href="#" title="" class="exp"><span>Forms stuff</span><strong>4</strong></a>--}}
            {{--<ul class="sub">--}}
                {{--<li><a href="forms.html" title="">Form elements</a></li>--}}
                {{--<li><a href="form_validation.html" title="">Validation</a></li>--}}
                {{--<li><a href="form_editor.html" title="">WYSIWYG and file uploader</a></li>--}}
                {{--<li class="last"><a href="form_wizards.html" title="">Wizards</a></li>--}}
            {{--</ul>--}}
        {{--</li>--}}
        {{--<li class="ui"><a href="{{route('admin.user.index')}}" title=""><span>Quản lý user</span></a></li>--}}
        <li class="tables"><a href="tables.html" title="" class=" exp"><span>Quản lý sản phẩm</span><strong>3</strong></a>
            <ul class="sub">
                <li><a href="{{route('admin.products.index')}}" title="">Sản phẩm</a></li>
                <li class="this"><a href="{{route('admin.typeproducts.index')}}" title="">Loại sản phẩm</a></li>
                <li class="last"><a href="{{route('admin.producer.index')}}" title="">Danh mục sản phẩm</a></li>


            </ul>
        </li>
        <li class="ui"><a href="#" title="" class="exp"><span>Quản lý thành viên</span><strong>2</strong></a>
            <ul class="sub">
                <li><a href="{{route('admin.user.index')}}" title="User">Users</a></li>
                <li class="last"><a href="{{route('admin.account.account')}}" title="Account">Account</a></li>
            </ul>
        </li>

        <li class="files"><a href="#" title="" class="exp"><span>Quảng lý đơn hàng</span><strong>1</strong></a>
            <ul class="sub">
                <li><a href="{{route('admin.orders.index')}}" title="">Đơn hàng</a></li>
            </ul>
        </li>
        <li class="typo"><a href="#" title="" class="exp"><span>Quảng lý bình luận</span><strong>1</strong></a>
            <ul class="sub">
                <li><a href="{{route('admin.review.index')}}" title="">Review sản phẩm</a></li>
            </ul>
        </li>
        <li class="typo"><a href="#" title="" class="exp"><span>Quảng lý Subscribe</span><strong>1</strong></a>
            <ul class="sub">
                <li><a href="{{route('admin.sub.index')}}" title="">Subscribe</a></li>
            </ul>
        </li>
    </ul>
</div>