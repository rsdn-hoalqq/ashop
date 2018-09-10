
	@include('templates.shop.header')
	<!-- SITE MAIN CONTENT -->
	<main class="main-content">
		@if(Session::has('message'))

			@endif
		<div class="bredcrumbWrap">
			<div class="container">
				<nav class="breadcrumb"> <a href="http://adornthemes.com/" title="Back to the home page">Trang Chủ</a> <span aria-hidden="true">&rsaquo;</span> <span>Đăng nhập</span> </nav>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="hidden-sm col-md-3"></div>
				<div class="col-md-6">
					<h1 class="pageTitle text-center">Khách hàng đã đăng ký</h1>
					<div id="CustomerLoginForm" class="form-vertical">
						<form method="post" action="{{route('shop.login.login')}}" accept-charset="UTF-8" enctype="multipart/form-data">
							{{csrf_field()}}
							<label class="hidden-label">Tên đăng nhập</label>
							<input type="email" name="email" class="input-full" placeholder="Email*" autofocus>
							<label class="hidden-label">Mật khẩu</label>
							<input type="password" name="password" class="input-full" placeholder="Mật khẩu*">
							@if(Session::has('msg'))
								<div class="nNote nInformation hideit">
									<p style="color: red;"><strong> {{Session::get('msg')}} </strong></p>
								</div>
							@endif
							<p><input type="submit" class="btn btn--full" value="Đăng nhập"  /></p>
							<div class="row">
								<div class="col-sm-6">
									<p><a href="{{route('shop.index.index')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại trang chủ</a></p>
								</div>
								<div class="col-sm-6 text-right forget-pwd">
									<p><a href="#recover" id="RecoverPassword">Quên mật khẩu <i class="fa fa-question-circle" aria-hidden="true"></i> </a></p>
								</div>
								<div class="col-sm-6">
									<p><a class="btn btn-warning" href="{{url('facebook/redirect')}}"><i  ></i> FB login̉</a></p>
								</div>
								<div class="col-sm-6">
									<p><a class="btn btn-primary" href="{{url('google/redirect')}}"><i ></i> google login</a></p>
								</div>
							</div>
						</form>
					</div>
					<div id="RecoverPasswordForm" class="hidden">
						<p class="lead mb0">Reset your password</p>
						<p>We will send you an email to reset your password.</p>
						<div class="form-vertical">
							<form method="post" action="http://adornthemes.com/" accept-charset="UTF-8">
								<label for="RecoverEmail" class="hidden-label">Email</label>
								<input type="email" value="" name="email" id="RecoverEmail" class="input-full" placeholder="Email">
								<p>
									<input type="submit" class="btn btn--full" value="Submit">
								</p>
								<button type="button" id="HideRecoverPasswordLink" class="text-link">Cancel</button>
							</form>
						</div>
					</div>
				</div>
				<div class="hidden-sm col-md-3"></div>
			</div>
		</div>
	</main>
	<!-- SITE FOOTER -->
	@include('templates.shop.footer')