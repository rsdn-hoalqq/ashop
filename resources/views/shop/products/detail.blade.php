@include('templates.shop.header')

<!-- SITE MAIN CONTENT -->
@if(Session::has('message'))

@endif
<main class="main-content">
	<!-- BREADCRUMB -->
	<div class="bredcrumbWrap">
		<div class="container">
			<nav class="breadcrumb"> <a href="http://adornthemes.com/" title="Back to the home page">Home</a> <span aria-hidden="true">&rsaquo;</span> <span>{{$arDetails->name}}</span> </nav>
		</div>
	</div>
	<div class="container"	itemscope itemtype="http://schema.org/Product">
		<div class="row product-single">
			<!-- PRODUCT GALLERY -->
			<div class="col-sm-6 text-center">
				<div class="product-single_photos" id="ProductPhoto"> <img  src="{{$imgUrl}}/files/{{$arDetails->image}}" alt="" class="ProductPhotoImg zoom" data-zoom-image="{{$imgUrl}}/files/{{$arDetails->image}}"> </div>

				<!-- 	PRODUCT THUMBNAIL -->

				<div class="ProductThumbs"> <!-- Don't remove this class. jQuery is applied on this class -->
					<div class="product-single_thumbnails owl-carousel" id="ProductThumbs">
						<div class="item"> <a href="{{$imgUrl}}/files/{{$arDetails->image}}" data-image="{{$imgUrl}}/files/{{$arDetails->image}}" data-zoom-image="{{$imgUrl}}/files/{{$arDetails->image}}" class="product-single_thumbnail"> <img src="{{$imgUrl}}/files/{{$arDetails->image}}" alt=""> </a> </div>
						<div class="item"> <a href="{{$imgUrl}}/files/{{$arDetails->image}}" data-image="{{$imgUrl}}/files/{{$arDetails->image}}" data-zoom-image="{{$imgUrl}}/files/{{$arDetails->image}}" class="product-single_thumbnail"> <img src="{{$imgUrl}}/files/{{$arDetails->image}}" alt=""> </a> </div>
						<div class="item"> <a href="{{$imgUrl}}/files/{{$arDetails->image}}" data-image="{{$imgUrl}}/files/{{$arDetails->image}}" data-zoom-image="{{$imgUrl}}/files/{{$arDetails->image}}" class="product-single_thumbnail"> <img src="{{$imgUrl}}/files/{{$arDetails->image}}" alt=""> </a> </div>
						{{--<div class="item"> <a href="{{$publicUrl}}/images/products/product-1-large-2.jpg" data-image="{{$publicUrl}}/images/products/product-1-large-2.jpg" data-zoom-image="{{$publicUrl}}/images/products/product-1-large-2.jpg" class="product-single_thumbnail"> <img src="{{$publicUrl}}/images/product-thumb/product-1-thumb-2.jpg" alt=""> </a> </div>--}}
						{{--<div class="item"> <a href="{{$publicUrl}}/images/products/product-1-large-3.jpg" data-image="{{$publicUrl}}/images/products/product-1-large-3.jpg" data-zoom-image="{{$publicUrl}}/images/products/product-1-large-3.jpg" class="product-single_thumbnail"> <img src="{{$publicUrl}}/images/product-thumb/product-1-thumb-22.jpg" alt=""> </a> </div>--}}
						{{--<div class="item"> <a href="{{$publicUrl}}/images/products/product-1-large-4.jpg" data-image="{{$publicUrl}}/images/products/product-1-large-4.jpg" data-zoom-image="{{$publicUrl}}/images/products/product-1-large-4.jpg" class="product-single_thumbnail"> <img src="{{$publicUrl}}/images/product-thumb/product-1-thumb-3.jpg" alt=""> </a> </div>--}}
						{{--<div class="item"> <a href="{{$publicUrl}}/images/products/product-1-large-5.jpg" data-image="{{$publicUrl}}/images/products/product-1-large-5.jpg" data-zoom-image="{{$publicUrl}}/images/products/product-1-large-5.jpg" class="product-single_thumbnail"> <img src="{{$publicUrl}}/images/product-thumb/product-1-thumb-4.jpg" alt=""> </a> </div>--}}
					</div>
				</div>
			</div>

			<!-- PRODUCT GALLERY -->
			<div class="col-sm-6">
				<h1 itemprop="name">{{$arDetails->name}}</h1>

				<!-- PRODUCT prev-next -->

				{{--<span class="spr-badge"> <span class="spr-starrating spr-badge-starrating"> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i>--}}

						<!-- remove hidden class from below line as per your requirment -->
					{{--<i class="fa fa-star hidden" aria-hidden="true"></i> <i class="fa fa-star-half hidden" aria-hidden="true"></i> <i class="fa fa-star-half-o hidden" aria-hidden="true"></i> </span> <span class="spr-badge-caption">No reviews</span> </span>--}}
				@if($arDetails->promotion_price==null)

					<div class="product-price"> <span class="ProductPrice h2"> {!!number_format( $arDetails->unit_price,0,",",".")!!} VND</span> </div>

				@elseif($arDetails->promotion_price!=null)
					<div class="product-price"> <span class="ProductPrice h2"> {!!number_format( $arDetails->promotion_price,0,",",".")!!} VND</span> </div>
					<!-- remove hidden class from below div as per your requirment -->
					<div class="product-price hidden"> <span id="ComparePrice">$452.82</span> <span class="ProductPrice h2">$387.95</span> </div>
					<!-- AVAILABILITY , TYPE,	SKU -->
					<div class="product-info">
						<p class="product-stock">Giá trước đây : <span class="instock"><s>{!!number_format( $arDetails->unit_price,0,",",".")!!} VND </s></span> </p>
				@endif
				<!-- PRICE-->


					<!-- remove hidden class from below div as per your requirment -->

					<p class="product-type">Số lượng  : <span style="color: #c59c20;">Còn {{$arDetails->soluong}} sản phẩm trong kho </span></p>
					{{--<p class="product-type">Vendor : <span>Philips</span></p>--}}
					{{--<p class="product-sku">SKU : <span>20</span></p>--}}
				</div>

				<!-- PRODUCT SHORT DESC. -->

				<p class="product-short-des">{!!  $arDetails->description!!}</p>
				<div class="product-attribute">
					<form class="form-vertical">

						<div class="actions">
							<div class="product-qty">

							</div>
							<a class="add-to-cart" href="javascript:void (0)" id="{{$arDetails->pid}}"><span class="icon icon-cart" aria-hidden="true"></span>Add to Cart</a>
						</div>
					</form>
					<hr/>
				</div>

				<!-- PRODUCT SHARE -->

				<div class="product-sharing">
					<!-- Go to www.addthis.com/dashboard to customize your tools -->
					<div class="addthis_inline_share_toolbox"></div>
					<script type="text/javascript" src="../../../s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58de4559a2995bef"></script>

				</div>
			</div>
		</div>

		<!-- TABS -->

		<div class="product-tabs">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#tab1" title="Product Details"	>Giới thiệu sản phẩm</a></li>
				<li><a data-toggle="tab" href="#tab4"  title="Customer Review">Đánh giá sản phẩm</a></li>
			</ul>
			<div class="tab-content">
				<div id="tab1" class="tab-pane fade in active">
					<div class="product-description" itemprop="description">
						<p>{!!  $arDetails->detail!!}</p>
					</div>
				</div>
				<div id="tab4" class="tab-pane fade">
					<a data-toggle="tab" href="#tab2"  class="btn review-actions-newreview"> <i class="fa fa-pencil" aria-hidden="true"></i> Write a review </a>
					@foreach($reviews as $review)
						<div class="review-form">
							<h4>{{$review->your_name}}</h4>
							<p style="color: red">{{$review->email}}</p>
							<p>{{$review->comment}}</p>
						</div>
						<hr>
			@endforeach
				</div>
				<div id="tab2" class="tab-pane fade">
					<div class="review-container">

						<h2 class="review-form-title">Bình luận</h2>
						<div class="review-form">
							<form method="post" id="rev" action="" class="new-review-form">
								{{csrf_field()}}
								<input type="hidden" value="{{$arDetails->pid}}" name="pid">
								<label class="review-form-label">Tên hiển thị:</label>
								<input class="review-form-input spr-form-input-text " required minlength="5" name="name" value="" placeholder="Tên hiển thị" type="text">
								<label class="review-form-label">Email</label>
								<input class="review-form-input spr-form-input-email "  required name="email"  value="" placeholder="abc@gmail.com" type="email">
								{{--<label class="review-form-label">Rating</label>--}}
								{{--<span class="spr-badge"> <span class="spr-starrating spr-badge-starrating"> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </span> </span>--}}
								<label class="review-form-label">Nội dung </label>
								<div class="review-form-input">
									<textarea class="review-form-input review-form-input-textarea " required minlength="5"  name="comment" rows="4" placeholder="Nội dung"></textarea>
								</div>
								<button type="submit" class="sendReview spr-button spr-button-primary button button-primary btn btn-primary" >Submit</button>
							</form>
							{{--<div class="review-summary clearfix"> <span class="spr-badge"> <span class="spr-starrating spr-badge-starrating"> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i>--}}
										{{--<!-- remove hidden class from below line as per your requirment -->--}}
								{{--<i class="fa fa-star hidden" aria-hidden="true"></i> <i class="fa fa-star-half hidden" aria-hidden="true"></i> <i class="fa fa-star-half-o hidden" aria-hidden="true"></i> </span> <span class="spr-badge-caption">No reviews</span> </span>--}}
								{{--<!-- <a href="#" class="btn review-actions-newreview"> <i class="fa fa-pencil" aria-hidden="true"></i> Write a review </a> -->--}}
							{{--</div>--}}
							<script>
                                $( document ).ready( function () {

                                    $( "#new-review-form" ).validate( {
                                        ignore: [],
                                        debug: false,
                                        rules: {
                                            name: {
                                                required: true,
                                            },
                                            comment: {
                                                required: true,
												minlenght:5
                                            },
                                            email: {
                                                required: true,
                                                email: true,
                                            },

                                        },
                                        messages: {
                                            name: {
                                                required: "Vui lòng nhập vào đây",
                                            },
                                            comment: {
                                                required: "Vui lòng nhập vào đây",
                                                minlength: "Vui lòng nhập tối thiểu 5 ký tự",
                                            },
                                            email:{
                                                required: "Vui lòng nhập vào đây",
                                                email:"Email chưa đúng định dạng",
                                            }

                                        }
                                    });
                                });
							</script>
							<script>

                                $(document).ready(function () {

                                    $(".sendReview").click(function () {
                                        var name=$("input[name='name']").val();
                                        var email=$("input[name='email']").val();
                                        var comment=$("textarea[name='comment']").val();
                                        var token=$("input[name='_token']").val();
                                        var pid=$("input[name='pid']").val();

                                        $.ajax({
                                            url:'{{route('shop.products.review')}}',
                                            type:'POST',
                                            cache:false,
                                            data:{"_token":token,"name":name,"email":email,"comment":comment,"pid":pid},
                                            success:function (data) {
                                                alert('Cảm ơn bạn đã nhận xét. Vui lòng chờ phê duyệt');
                                            },
											error:function (data) {
                                                alert('vui lòng kiểm tra lại dữ liệu');
                                            }
                                        });

                                    });
                                });

							</script>
						</div>
					</div>
				</div>


			</div>
		</div>

		<!-- RELATED PRODUCT -->

		<section class="mb60">
			<div class="list list-related-products">
				<h2 class="section-title">Sản phẩm tương tự</h2>
				<div class="products">
					<div class="products-grid productSlider owl-carousel">
						@foreach($arSames as $arSame)
							@php
								$name=$arSame->name;
                                $pid=$arSame->pid;
                                $name_slug=str_slug($name);
                                $urlDetail=route('shop.products.detail',['slug'=>$name_slug,'id'=>$pid]);
							@endphp
							<div class="grid_item">
								<div class="product_image"><a href="{{$urlDetail}}"><img src="{{$imgUrl}}/files/{{$arSame->image}}" alt=""></a>
									<div class="action-buttons">
										{{--<a class="btn-action wishlist" href="wishlist.html" title="Add To Wishlist"><i class="fa fa-heart" aria-hidden="true"></i></a>--}}
										<a class="btn-action add-to-cart" href="javascript:void (0)" id="{{$arDetails->pid}}" title="Select Options"><span class="icon icon-cart" aria-hidden="true"></span></a>
										<button type="button" class="btn-action btn-quickview" title="Quick View" data-toggle="modal" data-target="#quickView-{{$pid}}"><i class="fa fa-eye" aria-hidden="true"></i></button>

									</div>
								</div>
								<div class="product_detail">
									{{--<label class="new">New</label>--}}
									{{--<label class="on-sale">Sale</label>--}}
									{{--<label class="sold-out">Sold Out</label>--}}
									<h3 class="product_name"><a href="{{$urlDetail}}">{{$arSame->name}}</a></h3>

									<span class="product_price"> {!!number_format( $arSame->promotion_price,0,",",".")!!} VND</span> </div>
								<span class="old_price"><span><s><small>{!!number_format( $arSame->unit_price,0,",",".")!!} VND</small></s></span></span> </p>

							</div>
						@endforeach

					</div>
					@foreach($arSames as $arItem)
						@php
							$name=$arItem->name;
                            $pid=$arItem->pid;
                            $name_slug=str_slug($arItem);
                            $urlDetail=route('shop.products.detail',['slug'=>$name_slug,'id'=>$pid]);
						@endphp
						@include('templates.shop._modal')
					@endforeach
				</div>
			</div>
		</section>

		<!-- RECENTLY VIEW PRODUCT -->


	</div>
</main>
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
<!-- SITE FOOTER -->
@include('templates.shop.footer')
