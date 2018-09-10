@include('templates.shop.header')
	
	<!-- SITE MAIN CONTENT -->
	<main class="main-content">
		<div class="bredcrumbWrap">
			<div class="container">
				<nav class="breadcrumb" > <a href="http://adornthemes.com/" title="Back to the home page">Home</a> <span aria-hidden="true">&rsaquo;</span> <span>Đăng ký</span> </nav>
			</div>
		</div>
		<div class="container">
			<div class="hidden-sm col-md-3"></div>
			<div class="col-md-6">
				<h1 class="pageTitle text-center">Tạo tài khoản khách hàng mới</h1>
				<div class="form-vertical">
					<form method="post" id="acc" action="{{route('shop.register.index')}}" id="create_customer" enctype="multipart/form-data" accept-charset="UTF-8">
						{{csrf_field()}}
						<label class="hidden-label">Họ và tên</label>
						<input type="text" name="fullname" id="fullname" class="input-full" placeholder="Họ và tên" autofocus>
						<label class="hidden-label">Số điện thoại</label>
						<input type="text" name="phone" id="phone" class="input-full" placeholder="Số điện thoại">
						<label class="hidden-label">Email</label>
						<input type="email" name="email" id="email" class="input-full" placeholder="Email" >
						<label class="hidden-label">Password</label>
						<input type="password" name="password" id="password" class="input-full" placeholder="Password">
						<label class="hidden-label">RePassword</label>
						<input type="password" class="input-full" id="repassword" name="repassword" placeholder="ReplayPassword">
						<p>
							<input type="submit" value="Create an Account" class="btn btn--full">
						</p>
						<a href="{{route('shop.index.index')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại trang chủ</a>
					</form>
                    
				</div>
                  @if(Session::has('msg'))
            <div class="nNote nInformation hideit">
                <p style="color: red;"><strong> {{Session::get('msg')}} </strong></p>
            </div>
        @endif
				<div class="hidden-sm col-md-3"></div>
			</div>

		</div>
	</main>
<script>
    $( document ).ready( function () {

        $( "#acc" ).validate( {
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
                    remote: "{{route('shop.register.AjaxCheckEmail')}}"
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
	
	<!-- SITE FOOTER -->
	@include('templates.shop.footer')
