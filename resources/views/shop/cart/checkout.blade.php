@include('templates.shop.header')
	
	<!-- SITE MAIN CONTENT -->
	<main class="main-content"> 
		<!-- BREADCRUMB -->
		<div class="bredcrumbWrap">
			<div class="container">
				<nav class="breadcrumb"> <a href="http://adornthemes.com/" title="Back to the home page">Home</a><span aria-hidden="true">›</span><span>Địa chỉ</span></nav>
			</div>
		</div>
		{{--@if(Session::has('content'))--}}
			{{--@foreach($carts as $cart)--}}
				{{--{{print_r($cart)}}--}}
				{{--@endforeach--}}
			{{--@endif--}}
		<div class="container">
			<h1 class="pageTitle">ĐỊA CHỈ</h1>
			<div class="check-outwraper">


				<form id="checkoutform" action="{{route('shop.cart.order')}}" method="post">
					{{csrf_field()}}
					<div class="row">
						<div class="col-sm-6 col-xs-12">
							<div class="billing-details">
								<h4 class="checkout-title">Địa chỉ giao hàng của quý khách</h4>
								<div class="row">
									<div class="col-md-6 col-sm-12">
										<label>Họ và tên</label>
										<div class="form-group"><input placeholder="Họ & tên" name="fullname" type="text" value="{{ Auth::user()->fullname}}" class="form-control" /></div>
									</div>
									<div class="col-md-6 col-sm-12">
										<label>Email</label>
										<div class="form-group"><input placeholder="Vui lòng nhập email" name="email" type="text" value="{{ Auth::user()->email}}" class="form-control" readonly /></div>
									</div>
								</div>
								<label>Điện thoại</label>
								<div class="form-group"><input placeholder="Điện thoại di động" name="phone" type="text" value="{{ Auth::user()->phone}}" class="form-control" /></div>

								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Tỉnh/ Thành phố</label>
											<select name="province" id="theloai" class="input-full" >
												<option value="">Tỉnh/ Thành phố</option>
												@foreach($provinces as $province)
													<option  value="{{$province->provinceid}}">{{$province->name}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Quận/ Huyện</label>
											<select name="town" id="loaitinAjax" class="input-full validate[required]" >
												<option value="">Quận/ Huyện</option>
											</select>

										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label>Phường/ Xã</label>
											<select name="commune" id="commune" class="input-full validate[required]" >
												<option value="">Phường/ Xã</option>
											</select>
										</div>
									</div>

								</div>
								<label>Vui lòng điền CHÍNH XÁC "tầng, số nhà, đường" để tránh trường hợp đơn hàng bị hủy ngoài ý muốn</label>
								<div class="form-group"><textarea name="hamlet" placeholder="Vui lòng điền CHÍNH XÁC tầng, số nhà, đường để tránh trường hợp đơn hàng bị hủy ngoài ý muốn" type="text" class="form-control" >{{ Auth::user()->hamlet}}</textarea></div>

							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="our-order payment-details mt-60 pr-20">
								<h4 class="checkout-title">Thông tin đơn hàng <small>({{\Gloudemans\Shoppingcart\Facades\Cart::count()}} sản phẩm)</small></h4>
								<div class="cart table-wrap">
									<table class="cart-table full table--responsive">
										<thead class="cart__row cart__header-labels">
										<tr>
											<th class="text-left">SẢN PHẨM</th>
											<th class="text-center">Giá</th>
											<th class="text-center">Số lượng</th>
											<th class="text-center">Thành tiền</th>

										</tr>
										</thead>
										<tbody>
										@foreach($contents as $item)
										<tr class="cart__row">
											<td>  {!! $item->name !!} </td>
											<td data-label="Price" class="price">{!!number_format( $item->price,0,",",".") !!}VND</td>
											<td data-label="Quantity" class="qty text-center">{!! $item->qty !!}</td>
											<td data-label="Total" class="text-right">{!!number_format( $item->price*$item->qty,0,",",".") !!} VND</td>

										</tr>
											{{--{{die( $item->price)}}--}}
										@endforeach
										</tbody>
									</table>
									<div class="cat-total text-right">
										<span class="cart__subtotal-title">Tổng tiền</span> <span class="h3 cart__subtotal"><span class=money>{{$total}}</span></span>
									</div>
									<div class="text-right">
										<button type="submit"  class="btn btn--full cart__checkout" >&nbsp; Hoàn Tất <i class="fa fa-chevron-right" aria-hidden="true"></i> &nbsp;</button>
									</div>
								</div>
							</div>
						</div>

					</div>
					<div class="row">



					</div>
				</form>
				<a target="_blank" href="https://www.nganluong.vn/button_payment.php?receiver=mrphong678@gmail.com&product_name={{ $item->id}}&price={{$total}}&return_url=(URL thanh toán thành công)">
					<img src="https://www.nganluong.vn/css/newhome/img/button/pay-lg.png"border="0" /></a>





			</div>

		</div>
	</main>
<script>
    $( document ).ready( function () {

        $( "#checkoutform" ).validate( {
            ignore: [],
            debug: false,
            rules: {
                fullname: {
                    required: true,
                },
                province: {
                    required: true,
                },
                commune: {
                    required: true,
                },
                hamlet: {
                    required: true,
                },
                town: {
                    required: true,
                },
                username:{
                    required:true,
                    minlength: 5,
                },
                password:{
                    required:true,
                    minlength: 5,
                },
                phone:{
                    required:true,
                    number:true,

                },
                email:{
                    required:true,
                    email:true,

                },
                repassword: {
                    required:true,
                    equalTo: "#password",
                }

            },
            messages: {
                fullname: {
                    required: "Vui lòng nhập vào đây",
                },
                username: {
                    required: "Vui lòng nhập vào đây",
                    minlength: "Vui lòng nhập tối thiểu 5 ký tự",
                },
                password: {
                    required: "Vui lòng nhập vào đây",
                    minlength: "Vui lòng nhập tối thiểu 5 ký tự",
                },
                phone:{
                    required: "Vui lòng nhập vào đây",
                    number:"SĐT không đúng"

                },
                province:{
                    required: "Vui lòng nhập vào đây",
                },
                commune:{
                    required: "Vui lòng nhập vào đây",
                },
                hamlet:{
                    required: "Vui lòng nhập vào đây",
                },
                town:{
                    required: "Vui lòng nhập vào đây",
                },
                email:{
                    required: "Vui lòng nhập vào đây",
                    email:"Email chưa đúng định dạng",
                    remote:"Email đã tồn tại",
                },
                repassword:{
                    equalTo: "Mật khẩu không khớp",
                    required: "Vui lòng nhập vào đây",

                },

            },
        });
    });
</script>
<script>
    $(document).ready(function (){
        $("#theloai").change(function () {
            var idProvince=$(this).val();
            $.ajax({
                url: '{{route("shop.ajax.ajax")}}',
                type: 'get',
                dataType: 'json',
                data: {idProvince: idProvince},
            })
                .done(function(data) {
                    var html = '<option selected value="">Quận/ Huyện</option>';
                    if (data.length > 0) {
                        data.forEach( function(element, valua) {
                            html += '<option value="'+element.districtid +'">'+element.name+'</option>';
                        });
                    }

                    $("#loaitinAjax").html(html);
                })
        });
    });
</script>
<script>
    $(document).ready(function (){
        $("#loaitinAjax").change(function () {
            var idCommune=$(this).val();
            $.ajax({
                url: '{{route("shop.ajax.ward")}}',
                type: 'get',
                dataType: 'json',
                data: {idCommune: idCommune},
            })
                .done(function(data) {
                    var html = '<option selected value="">Phường/ Xã</option>';
                    if (data.length > 0) {
                        data.forEach( function(element, valua) {
                            html += '<option value="'+element.wardid +'">'+element.name+'</option>';
                        });
                    }

                    $("#commune").html(html);
                })
        });
    });
</script>

	<!-- SITE FOOTER -->
	@include('templates.shop.footer')
