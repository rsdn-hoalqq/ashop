@include('templates.shop.header')
@if(Session::has('msg'))
	 "<script>
        alert('Cảm ơn bạn đã góp ý');
	</script>";
@endif
	<!-- SITE MAIN CONTENT -->
	<main class="main-content">
		<div class="map">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.082460042756!2d108.22478711429648!3d16.06121018888586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219cd079d734b%3A0x337f63b74a260795!2zQ-G6p3UgUuG7k25nIMSQw6AgTuG6tW5n!5e0!3m2!1svi!2s!4v1505140109170" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
		<div class="bredcrumbWrap">
			<div class="container">
				<nav class="breadcrumb"> <a href="/" title="Back to the home page">Trang chủ</a> <span aria-hidden="true">&rsaquo;</span> <span>Phản hồi</span> </nav>
			</div>
		</div>
		<div class="container">
			<h1 class="pageTitle">PHẢN HỒI</h1>
			<div  class="row">
				<div class="col-md-9 form-col">
					<p>Bộ phận phản hồi sẽ giải đáp thắc mắc bất kì vấn đề nào liên quan đến việc mua hàng tại shop chúng tôi, cảm ơn quý khách đã tin tưởng và lựa chọn.</p>
					<div class="form-vertical">
						<form method="post"  action="{{route('shop.contact.contact')}}" id="contact_form" class="contact-form" accept-charset="UTF-8">
							{{csrf_field()}}
							<input type="hidden" value="contact" name="form_type" />
							<input type="hidden" name="utf8" value="✓" />
							<label for="ContactFormName" class="hidden-label">Name</label>
							<input type="text" name="ContactFormName" id="ContactFormName" class="input" name="contact[name]" placeholder="Họ & tên"  value="">
							<label for="ContactFormEmail" class="hidden-label">Email</label>
							<input type="email" name="ContactFormEmail" id="ContactFormEmail" class="input" name="contact[email]" placeholder="Your Email" value="">
							<label for="ContactFormPhone" class="hidden-label">Phone Number</label>
							<input type="text"  id="ContactFormPhone" class="input" name="ContactFormPhone" placeholder="Số điện thoại"  value="">
							<label for="ContactFormMessage" class="hidden-label">Message</label>
							<textarea rows="10" name="ContactFormMessage" id="ContactFormMessage" class="input-full" name="contact[body]" placeholder="Nội dung phản hồi"></textarea>
							<input type="submit" class="btn right" value="Gởi">
						</form>
					</div>
				</div>
				<div class="col-md-3 ">
					<div class="detail-col">
						<h4>NẾU CÓ BẤT KÌ CÂU HỎI NÀO ?<br/>
							CHÚNG TÔI SẴN SÀNG GIÚP ĐỠ.</h4>
						<p class="line"></p>
						<p> Làm ơn gởi phản hồi theo mẫu bên trái.</p>
						<p><strong>Địa chỉ cơ sở 1</strong>, <br>
							109 Phạm Như Xương<br>
							Liên Chiểu<br>
							Đà nẵng</p>
						<p><strong>Địa chỉ cơ sở 2</strong>., <br>
							46 Phạm Văn Đồng,<br>
							Sơn Trà
							Đà nẵng</p>
						<p><strong>Email:</strong> mrphong678@domain.com<br>
							SĐT: 098 3030 495</p>
						<p class="open-hours"><strong>Thời gian mở cửa:</strong><br>
							Thứ 2 -> Chủ nhật: 9am - 11pm<br>
							</p>
					</div>
				</div>
			</div>
		</div>
	</main>
<script>
    $( document ).ready( function () {

        $( "#contact_form" ).validate( {
            ignore: [],
            debug: false,
            rules: {
                ContactFormName: {
                    required: true,
                },
                ContactFormMessage:{
                    required:true,
                    minlength: 5,
                },

                ContactFormPhone:{
                    required:true,
                    number:true,

                },
                ContactFormEmail:{
                    required:true,
                    email:true,

                },
            },
            messages: {
                ContactFormName: {
                    required: "Vui lòng nhập vào đây",
                },
                ContactFormMessage: {
                    required: "Vui lòng nhập vào đây",
                    minlength: "Vui lòng nhập tối thiểu 5 ký tự",
                },
                ContactFormPhone:{
                    required: "Vui lòng nhập vào đây",
                    number:"SĐT không đúng"

                },

                ContactFormEmail:{
                    required: "Vui lòng nhập vào đây",
                    email:"Email chưa đúng định dạng",
                },


            },
        });
    });
</script>
	<!-- SITE FOOTER -->
	@include('templates.shop.footer')
