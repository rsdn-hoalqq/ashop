<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<!--<![endif]-->

<!-- Mirrored from adornthemes.com/html/nexgeek/product-listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Aug 2017 05:43:13 GMT -->
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{-- <link rel="shortcut icon" href="{{$publicUrl}}/images/favicon.png" type="image/png"> --}}

    <!-- Title and description ================================================== -->
    <title>Cameras | NexGeek - Multipurpose Responsive eCommerce HTML Template</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- CSS ================================================== -->

    <link type="text/css" rel="stylesheet" href="{{$publicUrl}}/css/font-awesome.min.css">
    <link href="{{$publicUrl}}/css/animation.css" rel="stylesheet" type="text/css" media="all">
    <link href="{{$publicUrl}}/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <link href="{{$publicUrl}}/css/fancybox.css" rel="stylesheet" type="text/css" media="all">
    <link href="{{$publicUrl}}/css/flexslider.css" rel="stylesheet" type="text/css" media="all">
    <link href="{{$publicUrl}}/css/owl.css" rel="stylesheet" type="text/css" media="all">
    <link href="{{$publicUrl}}/css/style.css" rel="stylesheet" type="text/css" media="all">
    <link href="{{$publicUrl}}/css/media.css" rel="stylesheet" type="text/css" media="all">

    <!--[if lt IE 9]>
    <script src="{{$publicUrl}}/js/html5shiv.min.js" type="text/javascript"></script>
    <script src="{{$publicUrl}}/js/respond.min.js?8399760255042770992" type="text/javascript"></script>
    <![endif]-->

    <script type="text/javascript" src="{{$publicUrl}}/js/jquery-min.js"></script>
    <script type="text/javascript" src="{{$publicUrl}}/js/jquery.validate.min.js"></script>
    <script src="{{$publicUrl}}/js/modernizr.js" type="text/javascript"></script>

</head>
<body class="template-collection">
<!-- MOBILE HANDLE -->
<div id="NavDrawer" class="drawer drawer--left">
    <div class="drawer__header">
        <div class="drawer__title h3">NexGeek</div>
        <div class="drawer__close js-drawer-close">
            <button type="button"> <span class="icon icon-x" aria-hidden="true"></span></button>
        </div>
    </div>
    <!-- MOBILE NAV -->
    <ul class="mobile-nav">
        @foreach($arProducers as $arProducer)
        <li class="mobile-nav__item">

            <div class="mobile-nav__has-sublist"><a href="#" class="mobile-nav__link mobile-nav__item--active">{{$arProducer->produce_name}}</a>
                <div class="mobile-nav__toggle">
                    <button type="button" class="mobile-nav__toggle-open"> <span class="icon icon-plus" aria-hidden="true"></span></button>

                    <button type="button" class="mobile-nav__toggle-close"> <span class="icon icon-minus" aria-hidden="true"></span></button>

                </div>
            </div>
            <ul class="mobile-nav__sublist">
                @foreach(\App\Model\Producer::find($arProducer->producer_id)->post as $typeProduct)
                    @php
                        $id=$typeProduct->id;
                        $name=$typeProduct->name;
                        $name_slug=str_slug($name);

                        $url=route('shop.products.index',['slug'=>$name_slug,'id'=>$id]);
                    @endphp
                <li class="mobile-nav__item"><a href="{{$url}}" class="mobile-nav__link">{{$name}}</a> </li>
                @endforeach
            </ul>

        </li>
        @endforeach
        <li class="mobile-nav__item"><a href="{{route('shop.contact.contact')}}" class="mobile-nav__link">Contact Us</a> </li>
            @if(Auth::Check())
            @else
                <li class="mobile-nav__item"><a href="{{route('shop.login.login')}}">Đăng nhập</a> </li>
            @endif

        <li class="mobile-nav__item"><a href="{{ route('register') }}">Đăng xuất</a></li>
    </ul>
    <!-- MOBILE NAV END -->
</div>
<!-- MOBILE HANDLE END -->

<!-- MOBILE CART -->
<div id="CartDrawer" class="drawer drawer--right">
    <div class="drawer__header">
        <div class="drawer__title h3">My CART</div>
        <div class="drawer__close js-drawer-close">
            <button type="button"><span class="icon icon-x" aria-hidden="true"></span></button>
        </div>
    </div>
    <div id="CartContainer">
        <form class="cart ajaxcart" method="post" action="http://adornthemes.com/cart">
            @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $carts)
            <div class="ajaxcart__product">
                <div class="ajaxcart__row">
                    <div class="row">
                        <div class="col-xs-4"> <a class="ajaxcart__product-image" href="product-detail.html"><img alt="" src="{{$imgUrl}}/files/{{$carts->options->img}}"></a> </div>
                        <div class="col-xs-8">
                            <p> <a class="ajaxcart__product-name" href="product-detail.html">{{$carts->name}}</a></p>
                            <div class="row-table">
                                <div class="row-cell col-xs-7">
                                    <div class="input-group spinner number">

                                        <input type="text" class="txt-qty" value="{{$carts->qty }}">

                                    </div>
                                </div>
                                <div class="row-cell col-xs-5 text-right"> <span>{!!number_format( $carts->price*$carts->qty,0,",",".") !!}</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="ajaxcart__footer">
                <div class="row">
                    <div class="col-sm-7">
                        <p><strong>Thành tiền</strong></p>
                    </div>
                    <div class="col-sm-5 text-right">
                        <p>{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</p>
                    </div>
                </div>
                <p class="text-center">(Tổng số tiền thanh toán)</p>
                <a class="btn btn--full view-cart" href="{{route('shop.cart.index')}}">Giỏ hàng</a>
                {{--<button name="checkout" class="btn--secondary btn--full cart__checkout" type="button" OnClick="location.href='{{route('shop.cart.checkout')}}' "> Thanh toán <i class="fa fa-long-arrow-right" aria-hidden="true"></i> </button>--}}
            </div>
        </form>
    </div>
</div>
<!-- MOBILE CART END-->

<!-- MAIN PAGE AREA -->
<div id="PageContainer" >

    <!-- SITE HEADER -->
    <header class="site-header">
        @if(Auth::check())
        <div class="promotion-header">
            <div class="container">
                <p>

                      Xin chào <a href="{{route('shop.shop.logout')}}" title="Đăng xuất">
                            {{ Auth::user()->fullname}}
                        </a>
                </p>
                 </div>
        </div>
        @endif
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <ul class="customer-links">
                            {{--<li class="wishlist"><i class="fa fa-heart" aria-hidden="true"></i> <a href="wishlist.html" title="My Wishlist">Yêu thích</a> </li>--}}
                            @if(Auth::Check())
                            @else
                                <li><i class="fa fa-sign-in" aria-hidden="true"></i> <a href="{{route('shop.login.login')}}" title="Sign In">Đăng nhập</a></li>
                                @endif
                            <li><i class="fa fa-pencil" aria-hidden="true"></i> <a href="{{ route('register') }}" title="Create an account">Đăng ký</a> </li>
                        </ul>
                    </div>
                    <div class="col-sm-4"><a id="cart-number" href="#cart" class="cart-toggle js-drawer-open-right" aria-controls="CartDrawer" aria-expanded="false"> <span class="icon icon-cart" aria-hidden="true"></span> <span class="CartCount">{{\Gloudemans\Shoppingcart\Facades\Cart::count()}}</span> </a>
                        {{--<div class="currency"> <span class="selected-currency">USD</span>--}}
                            {{--<select class="currency-picker" name="currencies" style="display: inline; width: auto; vertical-align: inherit;">--}}
                                {{--<option value="USD" selected="selected">USD</option>--}}
                                {{--<option value="INR">INR</option>--}}
                            {{--</select>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
        </div>
        <div class="main-header">
            <div class="container">
                <div class="row row-table">
                    <div class="col-xs-12 col-sm-4 col-md-3 row-cell">
                        <div class="site-header_logo" itemscope="" itemtype="http://schema.org/Organization"><a href="/" title="NexGeek"><img src="{{$publicUrl}}/images/logo.png" alt="NexGeek"> </a> </div>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-9 row-cell">
                        <div class="site-header_search">
                            <form action="{{route('shop.search.search')}}" method="get" class="input-group search-bar">
                                <input name="search" placeholder="Tìm kiếm sản phẩm..." class="input-group-field" aria-label="Search our store" type="search">
                                <span class="input-group-btn">
								<button type="submit" class="btn icon-fallback-text"> <span class="icon icon-search" aria-hidden="true"></span> <span class="fallback-text">Search</span> </button>
								</span>
                            </form>
                        </div>
                        <div class="shiping_text"> <span class="icon"> <i class="fa fa-truck"></i> </span>
                            <p>Giao hàng nhanh<span>Trong vòng 24h</span></p>
                        </div>
                        <div class="order_text"> <span class="icon"> <i class="fa fa-phone-square"></i> </span>
                            <p>Đường dây nóng <span>098.3030.495</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- SITE NAVIGATION -->
    <nav class="nav-bar"> <a href="#" class="sticky-home-logo" title="Home"><i class="fa fa-home" aria-hidden="true"></i> </a>
        <div class="container">
            <div class="main-menu">
                <!-- begin site-nav -->
                <ul class="clearfix main-nav" id="AccessibleNav">
                    @foreach($arProducers as $arProducer)
                    <li class="has-dropdown  megamenu "><a href="" class="site-nav__link">{{$arProducer->produce_name}}</a> <i class="fa fa-plus"></i>
                        <div class="megamenu">
                            <ul class="sub-menu ">
                                @foreach(\App\Model\Producer::find($arProducer->producer_id)->post as $typeProduct)
                                    @php
                                        $id=$typeProduct->id;
                                        $name=$typeProduct->name;
                                        $name_slug=str_slug($name);

                                        $url=route('shop.products.index',['slug'=>$name_slug,'id'=>$id]);
                                    @endphp
                                <li><a href="{{$url}}" class="site-nav__link">{{$typeProduct->name}}</a> <i class="fa fa-plus"></i>
                                    {{--<ul class="sub-menu">--}}
                                        {{--<li><a href="product-listing.html" class="site-nav__link">convallis bibendum</a></li>--}}
                                    {{--</ul>--}}
                                </li>
                                    @endforeach
                            </ul>
                            {{--<div class="menuImg"><img src="{{$publicUrl}}/images/megamenu-camera.jpg" alt="Cameras"> </div>--}}
                        </div>
                    </li>
                    @endforeach
                    <li><a href="{{route('shop.contact.contact')}}" class="site-nav__link">Contact Us</a></li>

                </ul>
                <!-- site-nav -->
            </div>
            <div class="mobileview">
                <div class="row">
                    <div class=" col-xs-3  mobilecol">
                        <div class="site-nav--mobile">
                            <button type="button" class="site-nav__link js-drawer-open-left" aria-controls="NavDrawer"> <span class="icon icon-hamburger" aria-hidden="true"></span></button>
                        </div>
                    </div>
                    <div class="col-xs-3 mobilecol">
                        <div class="mobile-customer-links"> <i class="fa fa-user" aria-hidden="true"></i>
                            <ul class="customer-links">
                                {{--<li class="wishlist"> <i class="fa fa-heart" aria-hidden="true"></i> <a href="wishlist.html" title="My Wishlist">Yêu thích</a> </li>--}}
                                @if(Auth::Check())

                                    @elseif(Auth::Check()==Null)
                                    <li> <i class="fa fa-sign-in" aria-hidden="true"></i> <a href="{{route('shop.login.login')}}">Đăng nhập</a></li>
                                    @endif

                                <li> <i class="fa fa-pencil" aria-hidden="true"></i> <a href="{{ route('register') }}">Đăng ký</a> </li>
                            </ul>


                        </div>
                    </div>
                    {{--<div class="col-xs-3 mobilecol">--}}
                        {{--<div class="mobile-currency"> <span class="selected-currency">USD</span>--}}
                            {{--<select class="currency-picker" name="currencies">--}}
                                {{--<option value="USD" selected="selected">USD</option>--}}
                                {{--<option value="INR">INR</option>--}}

                            {{--</select>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class=" col-xs-3  mobilecol">
                        <div class="site-nav--mobile"><a href="cart.html" class="js-drawer-open-right site-nav__link" aria-controls="CartDrawer"><span class="icon icon-cart" aria-hidden="true"></span></a> </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{route('shop.cart.index')}}" class="cart-toggle sticky-cart"> <span class="icon icon-cart" aria-hidden="true"></span> <span class="CartCount">{{Cart::count()}}</span> </a> </nav>
