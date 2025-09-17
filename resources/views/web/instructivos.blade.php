@extends('web.layout.plantilla')

@section('content')
    <!--section-->
	<div class="section mt-0">
		<div class="breadcrumbs-wrap">
			<div class="container">
				<div class="breadcrumbs">
					<a href="{{route('web.inicio')}}">Inicio</a>
					<span>Instructivos</span>
				</div>
			</div>
		</div>
	</div>
	<!--//section-->
	<!--section-->
	<div class="section page-content-first">
		<div class="container mt-6">
			<div class="row">
				<div class="col-md">
					
					<div class="row d-flex flex-column flex-sm-row flex-md-column mt-3">
						<div class="col-auto col-sm col-md-auto">
							<div class="contact-box contact-box-1">
								<h5 class="contact-box-title">Horarios</h5>
								<ul class="icn-list">
									<li><i class="icon-clock"></i>Lun-Vie 07:00 - 12:00 AM</li>
								</ul>
							</div>
						</div>
						<div class="col-auto col-sm col-md-auto">
							<div class="contact-box contact-box-2">
								<h5 class="contact-box-title">Contact Info</h5>
								<ul class="icn-list">
									<li><i class="icon-telephone"></i>
										<div class="d-flex flex-wrap">
											<span>Telefono:&nbsp;&nbsp;</span>
											<span>0343-6224990</span></div>
									</li>
									<li><i class="icon-black-envelope"></i><a href="mailto:info@petrillilab.com.ar">info@petrillilab.com.ar</a></li>
								</ul>
							</div>
						</div>
					</div>
					
				</div>
				<div class="col-md-8 col-lg-9 mt-4 mt-md-0">
					<div class="title-wrap">
						<h1>Instructivos</h1></div>
				
					
						<div class="mt-3 mt-md-5 px-1 pt-1 px-md-4 bg-grey">
							<div id="faqAccordion1" class="faq-accordion" data-children=".faq-item">
								@foreach ($instructivos as $key => $instructivo)
								<div class="faq-item">
									<a data-toggle="collapse" data-parent="#faqAccordion{{$key}}" href="#faqItem{{$key}}" aria-expanded="true">{{$instructivo->titulo}}</a>
									<div id="faqItem{{$key}}" class="collapse faq-item-content" role="tabpanel">
										<div>
											{!! $instructivo->descripcion !!}
										</div>
									</div>
								</div>
								@endforeach
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--//section-->
@endsection