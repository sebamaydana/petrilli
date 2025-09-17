<div class="footer mt-0">
	<div class="container">
		<div class="row py-1 py-md-2 px-lg-0">
			<div class="col-lg-4 footer-col1 pt-lg-3">
				<div class="row flex-column flex-md-row flex-lg-column">
					<div class="col-md col-lg-auto">
						<div class="footer-logo">
							<img src="{{asset('images/footer-logo.png')}}" alt="" class="img-fluid">
						</div>
						

						<div class="mt-2 mt-lg-0"></div>
						<div class="footer-social d-none d-md-block d-lg-none">						
							<a href="https://www.instagram.com/petrilli_lab/" target="blank" class="hovicon"><i class="icon-instagram"></i></a>

						</div>



					</div>
					<div class="col-md">
						<div class="footer-text mt-1 mt-lg-1">
							<p>Laboratorio de Medicina regenerativa, Análisis clínicos y Bacteriología. Paraná, Entre Ríos.</p>
				<div class="h-decor"></div>
					<div >
					<div style="display:flex;">
						<img src="{{asset('images/content/cober.png')}}" alt="" class="img-fluid" width="160px">
						<div style="font-size:12px;margin-top:20px;">Nuestro Laboratorio cuenta con CONTROL DE CALIDAD EXTERNA</div>
					</div>
					
					</div>
							
						</div>
						
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-lg-4">
				<h3>Actualidad</h3>
				<div class="h-decor"></div>
				@foreach ($noticias as $noticia)
				<div class="footer-post d-flex">
					<div class="footer-post-photo"><img src="{{asset('images/content/noticia-3.jpg')}}" alt="" class="img-fluid"></div>
					<div class="footer-post-text">
						<div class="footer-post-title"><a href="{{route('web.noticia', $noticia->id)}}">{{$noticia->titulo}}</a></div>
						<p>{{Carbon\Carbon::parse($noticia->fecha)->format('d/m/Y')}}</p>
					</div>
				</div>
				@endforeach				
			</div>
			<div class="col-sm-6 col-lg-4">
				<h3>Nuestro Contacto</h3>
				<div class="h-decor"></div>
				<ul class="icn-list">
					<li><i class="icon-placeholder2"></i>Misiones 572. Paraná, Entre Ríos. CP 3100
						<br>
						<a href="{{route('web.contacto')}}" class="btn btn-xs btn-gradient"><i class="icon-placeholder2"></i><span>Ver la localización en el mapa</span><i class="icon-right-arrow"></i></a>
					</li>
					<li><i class="icon-telephone"></i><b><span class="phone"><span class="text-nowrap">0343-6224990</span></b>
						<br>
					</li>
					<li><i class="icon-black-envelope"></i><a href="mailto:info@petrillilab.com.ar">info@petrillilab.com.ar</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="container">
			<div class="row text-center text-md-left">
				<div class="col-sm">Copyright © 2024 <a href="#">Petrilli Lab</a><span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span>
					<a href="#">Privacy Policy</a></div>
				<div class="col-sm-auto ml-auto"><span class="d-none d-sm-inline">Telefono&nbsp;&nbsp;&nbsp;</span><i class="icon-telephone"></i>&nbsp;&nbsp;<b>0343-6224990</b></div>
			</div>
		</div>
	</div>
</div>