<div id="quickView-{{ $pid }}" class="modal fade quickView" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <button type="button" class="close-modal" data-dismiss="modal">&times;</button>
            <div class="modal-body">
                <div class="quick-view-container">
                    <div class="quickview-left">
                        <div class="qv-hidden on-sale">Sale</div>
                        <div class="product-single_photos"> <img class="ProductPhotoImg" src="{{$imgUrl}}/files/{{$arItem->image}}" alt=""> </div>
                        <!-- 	PRODUCT THUMBNAIL -->
                        <div class="ProductThumbs">
                            <div class="product-single_thumbnails owl-carousel">
                                <div class="item"> <a href="{{$imgUrl}}/files/{{$arItem->image}}" data-image="{{$imgUrl}}/files/{{$arItem->image}}" data-zoom-image="{{$publicUrl}}/images/products/product-1-large-1.jpg" class="product-single_thumbnail"> <img src="{{$imgUrl}}/files/{{$arItem->image}}" alt=""> </a> </div>
                                {{--<div class="item"> <a href="{{$publicUrl}}/images/products/product-1-large-2.jpg" data-image="{{$publicUrl}}/images/products/product-1-large-2.jpg" data-zoom-image="{{$publicUrl}}/images/products/product-1-large-2.jpg" class="product-single_thumbnail"> <img src="{{$publicUrl}}/images/product-thumb/product-1-thumb-2.jpg" alt=""> </a> </div>--}}
                                {{--<div class="item"> <a href="{{$publicUrl}}/images/products/product-1-large-3.jpg" data-image="{{$publicUrl}}/images/products/product-1-large-3.jpg" data-zoom-image="{{$publicUrl}}/images/products/product-1-large-3.jpg" class="product-single_thumbnail"> <img src="{{$publicUrl}}/images/product-thumb/product-1-thumb-22.jpg" alt=""> </a> </div>--}}
                                {{--<div class="item"> <a href="{{$publicUrl}}/images/products/product-1-large-4.jpg" data-image="{{$publicUrl}}/images/products/product-1-large-4.jpg" data-zoom-image="{{$publicUrl}}/images/products/product-1-large-4.jpg" class="product-single_thumbnail"> <img src="{{$publicUrl}}/images/product-thumb/product-1-thumb-3.jpg" alt=""> </a> </div>--}}
                                {{--<div class="item"> <a href="{{$publicUrl}}/images/products/product-1-large-5.jpg" data-image="{{$publicUrl}}/images/products/product-1-large-5.jpg" data-zoom-image="{{$publicUrl}}/images/products/product-1-large-5.jpg" class="product-single_thumbnail"> <img src="{{$publicUrl}}/images/product-thumb/product-1-thumb-4.jpg" alt=""> </a> </div>--}}
                            </div>
                        </div>
                    </div>
                    <div class="quickview-right">
                        <h1><strong>{{ $name }}</strong></h1>
                        <span class="qv-product-price sale_price qv-hidden"> $400.00 &nbsp; <del class="qv-product-compare-price old_price">$429.00</del> </span> <span class="qv-product-price product_price">{!!number_format( $arItem->promotion_price,0,",",".") !!} VND</span>
                        <p>{!!$arItem->description!!}</p>
                        <p><a id="qv-detail" href="{{$urlDetail}}"> View full product details <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></p>
                        <form  method="post">
                            <div class="qv-product-options">
                                <div class="qv-row">
                                    <a href="javascript:void (0)" class="qv-cartbtn btn add-to-cart" id="{{$pid}}">ADD TO CART</a>
                                </div>
                                <div class="qv-row">
                                    <p class="qv-sold-out qv-hidden">Sold Out</p>
                                </div>
                                <div class="qv-row">
                                    <div class="qv-addcart-msg qv-hidden"> Item added to cart! <a href="cart.html">View Cart</a>.</div>
                                    <div class="qv-addcart-msg qv-hidden"> This product is already in your <a href="cart.html">Cart</a>.</div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
