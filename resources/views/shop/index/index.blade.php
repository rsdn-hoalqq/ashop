@include('templates.shop.header')
@if(Session::has('msgs'))
               <script>
        alert('Bạn cần mua hàng trước khi thanh toán');
                       </script>
@endif
@if(Session::has('success'))
    <script>
        alert('Đơn hàng đã được đặt! Xin cảm ơn');
    </script>
@endif
    <!-- SITE MAIN CONTENT -->

    <main class="main-content">

        <section class="main-slideshow flexslider mb30">
            <ul id="slider" class="slides">
                <li class="item"> <a href="#"><img src="{{$publicUrl}}/images/slide_1.jpg" data-url="#" class="slide-img" alt="Lorum Ispum" draggable="false" /></a>
                    <div class="container">
                        <div class="row-table">
                            <div class="row-cell">
                                <div class="slide-des left">
                                    <h2>Closer than ever</h2>
                                    <p class="slide-text">Pellentesque posuere orci lobortis scelerisque blandit. Quisquemos sodales suscipit tortor ditaemcos condimentum lacus meleifend menean viverra auctor blanditos comodous.</p>
                                    <a class="btn btn--large btn-slide" href="#">Shop the Collection<i class="fa fa-caret-right" aria-hidden="true"></i> </a> </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="item"> <a href="#"><img src="{{$publicUrl}}/images/slide_2.jpg" data-url="#" class="slide-img" alt="Lorum Ispum" draggable="false" /></a>
                    <div class="container">
                        <div class="row-table">
                            <div class="row-cell">
                                <div class="slide-des right">
                                    <h2>Upgrade your Kitchen</h2>
                                    <p class="slide-text">Lorum Ispum. Pellentesque posuere orci lobortis scelerisque blandit.Quisquemos sodales suscipit tortor ditaemcos condimentum lacus meleifend menean viverra auctor blanditos comodous.</p>
                                    <a class="btn btn--large btn-slide" href="#">Shop the Collection<i class="fa fa-caret-right" aria-hidden="true"></i> </a> </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="item flex-active-slide"> <a href="#"><img src="{{$publicUrl}}/images/slide_3.jpg" data-url="#" class="slide-img" alt="comodous" draggable="false"></a> </li>
            </ul>
        </section>
        <script src="{{$publicUrl}}/js/flexslider.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.flexslider').flexslider({
                    animation:  "fade",
                    slideshowSpeed: 4000,
                    slideshow: true,
                    animationSpeed :500,
                    touch: true,
                    pauseOnHover: true,
                    controlNav:true
                });
            });
        </script>
        <section class="container mb60">
            <div class="col-3-block-banner">
                <div class="row">
                    <div class="col-xs-12 col-sm-4"><a href="#"><img src="{{$publicUrl}}/images/block_banner_1.jpg" alt="" /><span>Đồ dùng gia đình</span></a></div>
                    <div class="col-xs-12 col-sm-4"><a href="#"><img src="{{$publicUrl}}/images/block_banner_2.jpg" alt="" /><span>Laptop</span></a></div>
                    <div class="col-xs-12 col-sm-4"><a href="#"><img src="{{$publicUrl}}/images/block_banner_3.jpg" alt="" /><span>Điện thoại và máy tính bảng</span></a></div>
                </div>
            </div>
        </section>
        <section class="container mb60">
            <div class="list list-featured-products">
                <h2 class="section-title">Sản phẩm mới nhất</h2>
                <div class="products">
                    <div class="products-grid productSlider owl-carousel">
                        @foreach($arItems as $arItem)
                            @php
                                $name=$arItem->name;
                $pid=$arItem->pid;
                $name_slug=str_slug($name);
                             $urlDetail=route('shop.products.detail',['slug'=>$name_slug,'id'=>$pid]);
                        @endphp
                        <div class="grid_item">
                            <div class="product_image"> <a href="{{$urlDetail}}"><img src="{{$imgUrl}}/files/{{$arItem->image}}" alt="" /></a>
                                <div class="action-buttons">
                                    {{--<a class="btn-action wishlist" href="wishlist.html" title="Add To Wishlist"><i class="fa fa-heart" aria-hidden="true"></i></a>--}}
                                    <a class="btn-action add-to-cart" href="javascript:void(0)" id="{{$pid}}" title="Mua"><span class="icon icon-cart" aria-hidden="true"></span></a>
                                    <button type="button" class="btn-action btn-quickview" title="Quick View" data-toggle="modal" data-target="#quickView-{{$pid}}"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                </div>
                            </div>
                            <div class="product_detail">
                                <h3 class="product_name"><a href="{{$urlDetail}}">{{$arItem->name}}</a> </h3>
                                <label class="new">New</label>
                                <span class="product_price">{!!number_format( $arItem->unit_price,0,",",".")!!} VND</span> </div>
                        </div>

                            @endforeach

                    </div>
                    @foreach($arItems as $arItem)
                        @php
                            $name=$arItem->name;
                            $pid=$arItem->pid;
                            $name_slug=str_slug($name);
                            $urlDetail=route('shop.products.detail',['slug'=>$name_slug,'id'=>$pid]);
                        @endphp
                        @include('templates.shop._modal')
                    @endforeach
                </div>
            </div>
        </section>
        <script>

            $(document).ready(function () {

                $(".add-to-cart").click(function () {
                    var idCart = $(this).attr('id');
                    var token=$("input[name='_token']").val();
                    $.ajax({
                        url:'{{route('shop.cart.cart')}}',
                        type:'get',
                        cache:false,
                        data:{"_token":token,"idCart":idCart},
                        success:function (data) {
                            alert('Đặt hàng thành công');
                            window.location.reload();
                        },
                        error:function (data) {
                            alert('Sản phẩm tạm thời hết hàng');
                        }
                    });

                });
            });
        </script>
        <section class="block-banner mb60">
            <div class="container">
                {{--<div class="block-banner_caption">--}}
                    {{--<h2>New Collection</h2>--}}
                    {{--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>--}}
                    {{--<a href="http://www.adornthemes.com/html/nexgeek/product-list.html" title="Shop Now" class="btn btn--large">Shop Now <i class="fa fa-caret-right" aria-hidden="true"></i> </a> </div>--}}
            </div>
        </section>
        <section class="container mb60">
            <div class="list list-trending-products">
                <h2 class="section-title">Sản phẩm xem nhiều nhất</h2>
                <div class="products">
                    <div class="products-grid productSlider owl-carousel">
                        @foreach($views_limit as $limits)
                            @php
                                $name=$limits->name;
                                $pid=$limits->pid;
                                $name_slug=str_slug($name);
                                $urlDetail=route('shop.products.detail',['slug'=>$name_slug,'id'=>$pid]);
                            @endphp
                        <div class="grid_item">
                            <div class="product_image"> <a href="{{$urlDetail}}"><img src="{{$imgUrl}}/files/{{$limits->image}}" alt=""> </a>
                                {{--<div class="action-buttons"> <a class="btn-action wishlist" href="wishlist.html" title="Add To Wishlist"><i class="fa fa-heart" aria-hidden="true"></i></a> <a class="btn-action add-to-cart" href="product-detail.html" title="Select Options"><span class="icon icon-cart" aria-hidden="true"></span></a>--}}
                                    {{--<button type="button" class="btn-action btn-quickview" title="Quick View" data-toggle="modal" data-target="#quickView"><i class="fa fa-eye" aria-hidden="true"></i></button>--}}
                                {{--</div>--}}
                            </div>
                            <div class="product_detail">
                                <h3 class="product_name"><a href="{{$urlDetail}}">{{$limits->name}}</a> </h3>
                                <span class="product_price"><span> {!!number_format( $limits->promotion_price,0,",",".") !!} VND</span></span> </p>
                                <span class="product_price old_price"> <s> {!!number_format( $limits->unit_price,0,",",".") !!} VND</s> </span> </div>
                        </div>
                            @endforeach
                    </div>
                </div>
            </div>


        <section class="container mb60">
            <h2 class="section-title"> Thương Hiệu </h2>
            <div class="list list-brand">
                <div class="owl-carousel">
                    @foreach($type as $t)
                    <div class="item"><a title="Letraset" href="#"><img src="/storage/files/{{$t->images}}" alt=""></a> </div>
                    @endforeach
                </div>
            </div>
        </section>

    </main>

    <!-- SITE FOOTER -->
  @include('templates.shop.footer')
