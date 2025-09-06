<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta name="description" content="petrilli, petrilli lab, laboratorio, analisis, extraccion, regenerativa, Bacteriología">
	<meta name="author" content="conexioweb.com.ar">
	<meta name="format-detection" content="telephone=no">
	<title>Petrilli Laboratorio - Paraná, Entre Ríos.</title>
	<!-- Stylesheets -->
	<link href="{{asset('vendor/slick/slick.css')}}" rel="stylesheet">
	<link href="{{asset('vendor/animate/animate.min.css')}}" rel="stylesheet">
	<link href="{{asset('icons5/style.css')}}" rel="stylesheet">
	<link href="{{asset('vendor/bootstrap-datepicker/bootstrap-datetimepicker.css')}}" rel="stylesheet">
	<link href="{{asset('css/style.css')}}" rel="stylesheet">
	<link href="{{asset('color/color.css')}}" rel="stylesheet">
	<!--Favicon-->
	<link rel="icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">

<style>
			.float{
				position:fixed;
				width:60px;
				height:60px;
				bottom:40px;
				left:40px;
				background-color:#25d366;
				color:#FFF;
				border-radius:50px;
				text-align:center;
			        font-size:30px;
				box-shadow: 2px 2px 3px #999;
				z-index:0;
				}

			.my-float{
				margin-top:16px;
			}
		</style>
</head>

<body class="shop-page layout-petrilli">
<!--header-->
@include('web.partials.header')
<!--//header-->
<div class="page-content">
	@yield('content')
<!--//footer-->
@include('web.partials.footer')
<!--//footer-->
<div class="backToTop js-backToTop">
	<i class="icon icon-up-arrow"></i>
</div>
<div class="modal modal-form modal-form-sm fade" id="modalQuestionForm">
	<div class="modal-dialog">
		<div class="modal-content">
			<button aria-label='Close' class='close' data-dismiss='modal'>
				<i class="icon-error"></i>
			</button>
			<div class="modal-body">
				<div class="modal-form">
					<h3>Ask a Question</h3>
					<form class="mt-15" id="questionForm" method="post" novalidate>
						<div class="successform">
							<p>Your message was sent successfully!</p>
						</div>
						<div class="errorform">
							<p>Something went wrong, try refreshing and submitting the form again.</p>
						</div>
						<div class="input-group">
								<span>
								<i class="icon-user"></i>
							</span>
							<input type="text" name="name" class="form-control" autocomplete="off" placeholder="Your Name*"/>
						</div>
						<div class="input-group">
								<span>
									<i class="icon-email2"></i>
								</span>
							<input type="text" name="email" class="form-control" autocomplete="off" placeholder="Your Email*"/>
						</div>
						<div class="input-group">
								<span>
									<i class="icon-smartphone"></i>
								</span>
							<input type="text" name="phone" class="form-control" autocomplete="off" placeholder="Your Phone"/>
						</div>
						<textarea name="message" class="form-control" placeholder="Your comment*"></textarea>
						<div class="text-right mt-2">
							<button type="submit" class="btn btn-sm btn-hover-fill">Ask Now</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal modal-form fade" id="modalBookingForm">
	<div class="modal-dialog">
		<div class="modal-content">
			<button aria-label='Close' class='close' data-dismiss='modal'>
				<i class="icon-error"></i>
			</button>
			<div class="modal-body">
				<div class="modal-form">
					<h3>Book an Appointment</h3>
					<form class="mt-15" id="bookingForm" method="post" novalidate>
						<div class="successform">
							<p>Your message was sent successfully!</p>
						</div>
						<div class="errorform">
							<p>Something went wrong, try refreshing and submitting the form again.</p>
						</div>
						<div class="input-group">
								<span>
								<i class="icon-user"></i>
							</span>
							<input type="text" name="bookingname" class="form-control" autocomplete="off" placeholder="Your Name*"/>
						</div>
						<div class="row row-xs-space mt-1">
							<div class="col-sm-6">
								<div class="input-group">
										<span>
											<i class="icon-email2"></i>
										</span>
									<input type="text" name="bookingemail" class="form-control" autocomplete="off" placeholder="Your Email*"/>
								</div>
							</div>
							<div class="col-sm-6 mt-1 mt-sm-0">
								<div class="input-group">
										<span>
											<i class="icon-smartphone"></i>
										</span>
									<input type="text" name="bookingphone" class="form-control" autocomplete="off" placeholder="Your Phone"/>
								</div>
							</div>
						</div>
						<div class="row row-xs-space mt-1">
							<div class="col-sm-6">
								<div class="input-group">
										<span>
											<i class="icon-birthday"></i>
										</span>
									<input type="text" name="bookingage" class="form-control" autocomplete="off" placeholder="Your age"/>
								</div>
							</div>
						</div>
						<div class="selectWrapper input-group mt-1">
								<span>
									<i class="icon-micro"></i>
								</span>
							<select name="bookingservice" class="form-control">
								<option selected="selected" disabled="disabled">Select Service</option>
								<option value="Molecular Testing & Oncology">Molecular Testing & Oncology</option>
								<option value="Histology">Histology</option>
								<option value="General Diagnostic Tests">General Diagnostic Tests</option>
								<option value="Naturopathic">Naturopathic</option>
								<option value="Genetics Tests">Genetics Tests</option>
								<option value="Cytology">Cytology</option>
							</select>
						</div>
						<div class="input-group flex-nowrap mt-1">
								<span>
									<i class="icon-calendar2"></i>
								</span>
							<div class="datepicker-wrap">
								<input name="bookingdate" type="text" class="form-control datetimepicker" placeholder="Date" readonly>
							</div>
						</div>
						<div class="input-group flex-nowrap mt-1">
								<span>
									<i class="icon-clock"></i>
								</span>
							<div class="datepicker-wrap">
								<input name="bookingtime" type="text" class="form-control timepicker" placeholder="Time">
							</div>
						</div>
						<textarea name="bookingmessage" class="form-control" placeholder="Your comment"></textarea>
						<div class="text-right mt-2">
							<button type="submit" class="btn btn-sm btn-hover-fill">Book now</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Vendors -->
<script src="{{asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('vendor/jquery-migrate/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{asset('vendor/cookie/jquery.cookie.js')}}"></script>
<script src="{{asset('vendor/bootstrap-datepicker/moment.js')}}"></script>
<script src="{{asset('vendor/bootstrap-datepicker/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{asset('vendor/popper/popper.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{asset('vendor/waypoints/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('vendor/waypoints/sticky.min.js')}}"></script>
<script src="{{asset('vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('vendor/slick/slick.min.js')}}"></script>
<script src="{{asset('vendor/scroll-with-ease/jquery.scroll-with-ease.min.js')}}"></script>
<script src="{{asset('vendor/countTo/jquery.countTo.js')}}"></script>
<script src="{{asset('vendor/form-validation/jquery.form.js')}}"></script>
<script src="{{asset('vendor/form-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('vendor/isotope/isotope.pkgd.min.js')}}"></script>
<!-- Custom Scripts -->
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('color/color.js')}}"></script>
<script src="{{asset('js/app-shop.js')}}"></script>
<script src="{{asset('form/forms.js')}}"></script>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<a href="https://api.whatsapp.com/send?phone=543436224990&text=Consulta" class="float" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
</a>

</body>

</html>