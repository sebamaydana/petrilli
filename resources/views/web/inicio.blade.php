@extends('web.layout.plantilla')

@section('content')
    <!--section slider-->
	<div class="section mt-0">
		<div class="quickLinks-wrap js-quickLinks-wrap-d d-none d-lg-flex">
			<div class="quickLinks js-quickLinks closed">
				<div class="container">
					<div class="row no-gutters">
						<div class="col">
							<a href="#" class="link">
								<i class="icon-placeholder"></i><span>Ubicación</span></a>
							<div class="link-drop p-0">
								<div class="google-map">
									<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d848.3743559377897!2d-60.517858730348536!3d-31.72962095771996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95b452743dcda2af%3A0x40b00de09ac5c4cb!2sMisiones%20572%2C%20E3100%20Paran%C3%A1%2C%20Entre%20R%C3%ADos!5e0!3m2!1ses-419!2sar!4v1715993314827!5m2!1ses-419!2sar"></iframe>
								</div>
							</div>
						</div>
						<div class="col">
							<a href="#" class="link">
								<i class="icon-clock"></i><span>Horarios</span>
							</a>
							<div class="link-drop">
								<h5 class="link-drop-title"><i class="icon-clock"></i>Horarios</h5>
								<table class="row-table">
									<tr>
										<td><i>Lunes</i></td>
										<td>07:30 AM - 12:00 AM</td>
									</tr>
									<tr>
										<td><i>Martes</i></td>
										<td>07:30 AM - 12:00 AM</td>
									</tr>
									<tr>
										<td><i>Miercoles</i></td>
										<td>07:30 AM - 12:00 AM</td>
									</tr>
									<tr>
										<td><i>Jueves</i></td>
										<td>07:30 AM - 12:00 AM</td>
									</tr>

									<tr>
										<td><i>Viernes</i></td>
										<td>07:30 AM - 12:00 AM</td>
									</tr>


								</table>
							</div>
						</div>
						<div class="col">
							<a href="https://api.whatsapp.com/send?phone=543436224990&text=Hola" class="link">
								<i class="icon-pencil-writing"></i><span>Whatsapp</span>
							</a>
							
						</div>
						<div class="col">
							<a href="#" class="link">
								<i class="icon-calendar"></i><span>Calendario</span>
							</a>
							
						</div>
						
						
						<div class="col col-close"><a href="#" class="js-quickLinks-close"><i class="icon-top" data-toggle="tooltip" data-placement="top" title="Close panel"></i></a></div>
					</div>
				</div>
				<div class="quickLinks-open js-quickLinks-open"><span data-toggle="tooltip" data-placement="left" title="Open panel">+</span></div>
			</div>
		</div>
		<div id="mainSliderWrapper">
			<div class="loading-content">
				<div class="loader-dna">
					<column>
						<dot></dot>
						<dot></dot>
						<dot></dot>
						<dot></dot>
						<dot></dot>
						<dot></dot>
						<dot></dot>
						<dot></dot>
					</column>
					<column>
						<dash></dash>
						<dash></dash>
						<dash></dash>
						<dash></dash>
						<dash></dash>
						<dash></dash>
						<dash></dash>
						<dash></dash>
					</column>
					<column>
						<dot></dot>
						<dot></dot>
						<dot></dot>
						<dot></dot>
						<dot></dot>
						<dot></dot>
						<dot></dot>
						<dot></dot>
					</column>
				</div>
			</div>
			<div class="main-slider mb-0 arrows-white arrows-bottom" id="mainSlider" data-slick='{"arrows": false, "dots": true}'>
				<div class="slide">
					<div class="img--holder" data-bg="{{asset('images/content/slider/slide-01.jpg')}}"></div>
					<div class="slide-content center">
						<div class="vert-wrap container">
							<div class="vert">
								<div class="container">
									<div class="slide-txt1 text-no-uppercase" data-animation="fadeInDown" data-animation-delay="1s">Laboratorio<br>
										<b>en Medicina Regenerativa</b></div>
									<div class="slide-txt2 text-no-uppercase" data-animation="fadeInUp" data-animation-delay="1.5s">Laboratorio Petrilli. Paraná, Entre Ríos.</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="slide">
					<div class="img--holder" data-bg="{{asset('images/content/slider/slide-01.jpg')}}"></div>
					<div class="slide-content center">
						<div class="vert-wrap container">
							<div class="vert">
								<div class="container">
									<div class="slide-txt1 text-no-uppercase" data-animation="fadeInDown" data-animation-delay="1s">Laboratorio
										<br><b>en Analisis Clínicos</b></div>
									<div class="slide-txt2 text-no-uppercase" data-animation="fadeInUp" data-animation-delay="1.5s">Laboratorio Petrilli. Paraná, Entre Ríos.</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="slide">
					<div class="img--holder" data-bg="{{asset('images/content/slider/slide-01.jpg')}}"></div>
					<div class="slide-content center">
						<div class="vert-wrap container">
							<div class="vert">
								<div class="container">
									<div class="slide-txt1 text-no-uppercase" data-animation="fadeInDown" data-animation-delay="1s">Laboratorio
										<br><b>en Bacteriología</b></div>
									<div class="slide-txt2 text-no-uppercase" data-animation="fadeInUp" data-animation-delay="1.5s">Laboratorio Petrilli. Paraná, Entre Ríos.</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--//section slider-->

    <div class="footer-bottom">
                <div class="text-center text-left">
                    
        <a href="#" class="btn btn-gradient" ><i class="icon-right-arrow"></i><span>Turno Medicina Regenerativa</span><i class="icon-right-arrow"></i></a>    
        <a href="https://api.whatsapp.com/send?phone=543436224990&text=Hola" class="btn btn-gradient" ><i class="icon-right-arrow"></i><span>Turno Extracción</span><i class="icon-right-arrow"></i></a>
        <a href="{{route('filament.pacientes.auth.login')}}" class="btn btn-gradient" style="background-color:#1b3c76" ><i class="icon-right-arrow"></i><span>Resultados</span><i class="icon-right-arrow"></i></a>
                </div>
            </div>

        
        <!--section-->
        <div class="section bg-grey mt-md-0">
            <div class="container">
                
                <div class="nav nav-pills-icons js-nav-pills-carousel" role="tablist">
                    <a class="nav-link active" data-toggle="pill" href="#tab-A" role="tab"><i class="icon-molecular"></i><span>Nosotros</span></a>
                    <a class="nav-link" data-toggle="pill" href="#tab-B" role="tab"><i class="icon-testtube2"></i><span>Medicina Regenerativa</span></a>
                    <a class="nav-link" data-toggle="pill" href="#tab-C" role="tab"><i class="icon-micro"></i><span>Analisis Clínicos</span></a>
                    <a class="nav-link" data-toggle="pill" href="#tab-D" role="tab"><i class="icon-testtube"></i><span>Bacteriología</span></a>
                    <a class="nav-link" data-toggle="pill" href="#tab-E" role="tab"><i class="icon-chromosome"></i><span>Instructivos</span></a>
                    <a class="nav-link" data-toggle="pill" href="#tab-F" role="tab" style="display:none;"><i class="icon-dropper"></i><span>Cytology</span></a>
                    <a class="nav-link" data-toggle="pill" href="#tab-H" role="tab" style="display:none;"><i class="icon-molecular"></i><span>Molecular Testing & Oncology</span></a>
                    <a class="nav-link" data-toggle="pill" href="#tab-I" role="tab" style="display:none;"><i class="icon-testtube2"></i><span>Histology</span></a>
                    <a class="nav-link" data-toggle="pill" href="#tab-J" role="tab" style="display:none;"><i class="icon-micro"></i><span>General Diagnostic<br>Tests</span></a>
                    <a class="nav-link" data-toggle="pill" href="#tab-K" role="tab" style="display:none;"><i class="icon-testtube"></i><span>Naturopathic<br>Tests</span></a>
                    <a class="nav-link" data-toggle="pill" href="#tab-L" role="tab" style="display:none;"><i class="icon-chromosome"></i><span>Genetics Tests</span></a>
                    <a class="nav-link" data-toggle="pill" href="#tab-M" role="tab" style="display:none;"><i class="icon-dr	opper"></i><span>Cytology</span></a>
                </div>
                <div id="tab-content" class="tab-content mt-2 mt-sm-4">
                    <div id="tab-A" class="tab-pane fade show active" role="tabpanel">
                        <div class="tab-bg"><img src="{{asset('images/content/bg-map.png')}}" alt=""></div>
                        <div class="row">
                            <div class="col-md-6 h-100 mb-2 mb-md-0">
                                <img src="{{asset('images/content/index-img-01.jpg')}}" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <div class="pt-xl-1">
                                    <h3>Nosotros</h3>
                                    <p>Somos un equipo destinado a mejorar constantemente nuestro trabajo. Involucrados permanentemente con el avance científico y la excelencia.</p>
                                    <h3>Misión</h3>
                                    <p>Trabajamos con responsabilidad y calidad pensando en nuestros pacientes. Nos guía el compromiso y la confiabilidad.</p>
                                    <h3>Visión</h3>
                                    <p>Acreditar nuestro trabajo logrando mejores servicios para nuestros clientes.</p>							
                                                                    <p><b> BQCA. SILVIA SOLEDAD PETRILLI - MP 706. </b></p>
                            </div></div></div>
                    </div>
                    <div id="tab-B" class="tab-pane fade" role="tabpanel">
                        <div class="tab-bg"><img src="{{asset('images/content/bg-map.png')}}" alt=""></div>
                        <div class="row">
                            <div class="col-md-6 h-100 mb-2 mb-md-0">
                                <img src="{{asset('images/content/index-img-01-2.jpg')}}" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <div class="pt-xl-1">								
                                    <h3>Medicina Regenerativa</h3>
                                    <p>En el ámbito de la medicina regenerativa, nuestro equipo de científicos y médicos trabaja incansablemente para desarrollar terapias que regeneren tejidos y órganos dañados. Utilizamos tecnologías avanzadas como células madre y biomateriales para crear tratamientos que ofrezcan esperanza a pacientes con enfermedades crónicas y lesiones severas.</p>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab-C" class="tab-pane fade" role="tabpanel">
                        <div class="tab-bg"><img src="{{asset('images/content/bg-map.png')}}" alt=""></div>
                        <div class="row">
                            <div class="col-md-6 h-100 mb-2 mb-md-0">
                                <img src="{{asset('images/content/index-img-01-3.jpg')}}" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <div class="pt-xl-1">
                                    <h3>Análisis Clínicos</h3>
                                    <p>Nuestros análisis clínicos abarcan una amplia gama de pruebas esenciales para el diagnóstico y seguimiento de diversas condiciones de salud. Con tecnología de punta y un riguroso control de calidad, proporcionamos resultados precisos y oportunos que ayudan a los médicos a tomar decisiones informadas y a los pacientes a comprender mejor su estado de salud.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab-D" class="tab-pane fade" role="tabpanel">
                        <div class="tab-bg"><img src="{{asset('images/content/bg-map.png')}}" alt=""></div>
                        <div class="row">
                            <div class="col-md-6 h-100 mb-2 mb-md-0">
                                <img src="{{asset('images/content/index-img-01-4.jpg')}}" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <div class="pt-xl-1">
                                    <h3>Bacteriología</h3>
                                    <p>En el campo de la bacteriología, nos especializamos en el estudio de bacterias y su impacto en las enfermedades infecciosas. Realizamos cultivos bacteriológicos, pruebas de sensibilidad a antibióticos y estudios de resistencia bacteriana, contribuyendo al desarrollo de tratamientos más efectivos y estrategias de control de infecciones.</p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
    <div id="tab-E" class="tab-pane fade" role="tabpanel">
                        <div class="tab-bg"><img src="{{asset('images/content/bg-map.png')}}" alt=""></div>
                        <div class="row">
                            <div class="col-md-6 h-100 mb-2 mb-md-0">
                                <img src="{{asset('images/content/index-img-01-5.jpg')}}" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <div class="pt-xl-1">
                                    <h3>Instructivos</h3>
                                    <div id="faqAccordion1" class="faq-accordion" data-children=".faq-item">
                                    <div class="faq-item">
                                        <a data-toggle="collapse" data-parent="#faqAccordion1" href="#faqItem1" aria-expanded="false" class="collapsed">Extracción de Sangre</a>
                                        <div id="faqItem1" class="faq-item-content collapse" role="tabpanel" style="">
                                            <div>
                                                <p>Permanecer en ayunas y solo beber agua.</p> 
                                                <p>No fumar, masticar chicle ni comer caramelos o pastillas.</p>
                                                <p>Reducir al mínimo la actividad física y evitar situaciones de estrés.</p>
                                                <p>No haberse sometido a estudios por imágenes con contraste endovenoso dentro de las 72hs previas a la toma de la muestra.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="faq-item">
                                        <a data-toggle="collapse" data-parent="#faqAccordion1" href="#faqItem2" aria-expanded="false" class="collapsed">Orina Completa</a>
                                        <div id="faqItem2" class="collapse faq-item-content" role="tabpanel" style="">
                                            <div>
                                                <p>Recolectar la primera orina de la mañana, o como mínimo una retención de 3 horas de retencion</p>
                                                <p>Higienizar bien con agua y jabón, enjuagar y secar con toalla descartable. </p>
                                                <p>Comenzar a orinar en el inodoro, descartando el primer chorro de orina, y sin interrumpir la micción recolectar el siguiente chorro (chorro medio) en un recipiente provisto por el laboratorio</p>
                                                <p>Tapar el recipiente y remitirlo al Laboratorio inmediatamente, o mantener refrigerado</p>
                                                <p>Puede conservar la muestra en heladera hasta 12 horas. NO congelar.</p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="faq-item">
                                        <a data-toggle="collapse" data-parent="#faqAccordion1" href="#faqItem3" aria-expanded="false" class="collapsed">Recolección de Materia Fecal para Parasitológico</a>
                                        <div id="faqItem3" class="collapse faq-item-content" role="tabpanel" style="">
                                            <div>											
                                        <p>Durante tres días consecutivos colocar una porción de material fecal seleccionando las fracciones más blandas, líquidas, mucosas o sanguinolentas en el frasco con formaldehido aportado por el laboratorio</p>
                                        <p>Realizar la defecación espontánea en algún recipiente limpio</p>
                                        <p>Trasvasarla con cuchara descartable al recipiente. Se recomienda durante las 72 horas previas a la recolección</p>
                                        <p>NO ingerir antibióticos, salvo expreso pedido del médico</p>
                                        <p>Recolectar la primera orina de la mañana</p>
                                        <p>Higienizar bien con agua y jabón, enjuagar y secar con toalla descartable</p>
                                        <p>Comenzar a orinar en el inodoro, descartando el primer chorro de orina, y sin interrumpir la micción recolectar el siguiente chorro (chorro medio) en un recipiente estéril provisto por el laboratorio</p>	
                                        <p>Tapar el recipiente y remitirlo al Laboratorio</p>
                                        <p>Puede conservar la muestra en heladera hasta 12 horas</p>


                                            </div>
                                        </div>
                                    </div>

                                    <div class="faq-item">
                                        <a data-toggle="collapse" data-parent="#faqAccordion1" href="#faqItem4" aria-expanded="false" class="collapsed">Orina 24 horas</a>
                                        <div id="faqItem4" class="collapse faq-item-content" role="tabpanel" style="">
                                            <div>
                                                <p>RECIPIENTE: Utilizar un bidón de 2 a 4 litros provisto por el laboratorio.</p> 
                                                <h4>RECOLECCION DE ORINA:</h4>
                                                <p>Vaciar la vejiga, orinando en el inodoro.</p>
                                                <p>Empezar a contar a partir de la hora en que lo haga (por ejemplo, a las 7 de la mañana). Desde ese momento recoger en el bidón la TOTALIDAD de la orina de todas las micciones, hasta la misma hora del día siguiente (7 de la mañana). </p>
                                                <p>Mantener el bidón en lugar fresco y oscuro. PREFERENTEMENTE EN HELADERA.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="faq-item">
                                        <a data-toggle="collapse" data-parent="#faqAccordion1" href="#faqItem5" aria-expanded="false" class="collapsed">Coprocultivo</a>
                                        <div id="faqItem5" class="collapse faq-item-content" role="tabpanel" style="">
                                            <div>
                                                <p>Durante tres días consecutivos colocar una porción de material fecal.</p> 
                                                <p>Realizar la defecación espontánea en algún recipiente limpio seleccionando las fracciones más blandas, líquidas, mucosas o sanguinolentas en el envase estéril provisto por el laboratorio.</p>
                                                <p>Trasvasarla con cuchara descartable al recipiente.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="faq-item">
                                        <a data-toggle="collapse" data-parent="#faqAccordion1" href="#faqItem6" aria-expanded="false" class="collapsed">Parasitologico Materia Fecal</a>
                                        <div id="faqItem6" class="collapse faq-item-content" role="tabpanel" style="">
                                            <div>
                                                <p>Durante tres días consecutivos colocar una porción de material fecal seleccionando las fracciones más blandas, líquidas, mucosas o sanguinolentas en el frasco con formaldehido aportado por el laboratorio.</p> 
                                                <p>Realizar la defecación espontánea en algún recipiente limpio.</p>
                                                <p>Trasvasarla con cuchara descartable al recipiente.</p>

                                            </div>
                                        </div>
                                    </div>


                                </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                
                    
                    
                    
                    
                </div>
            </div>
        </div>
        <!--//section-->
        

        <!--section services -->
        <div class="section bg-norepeat bg-md-none section-top-padding" style="background-image: url(images/bg-top-left.png)">
            <div class="container-fluid px-0 over-visible">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="services-tab-wrap float-right">
                            <div class="title-wrap-alt text-center text-md-left">
                                <div class="h-sub theme-color">que ofrecemos</div>
                                <h2 class="h1 double-title double-title--top-md" data-title="Services"><span>Nuestros <span class="theme-color">Servicios</span></span></h2>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-auto">


                                    <ul class="marker-list-md">
                                        <li>Plasma Rico en Plaquetas</li>
                                        <li>Colirios Autologos</li>
                                        <li>PRP Traumatología</li>
                                        <li>PRP Intrauterino</li>
                                        <li>Suero Autologo</li>
                                        <li>Química Analítica</li>
                                    </ul>
                                </div>
                                <div class="col-sm-auto mt-1 mt-md-0">
                                    <ul class="marker-list-md">
                                        <li>Hormonas</li>
                                        <li>Serología</li>
                                        <li>Bacteriología</li>
                                        <li>Micología</li>
                                        <li>Parasitología</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 position-relative">
                        <div class="ml-xl-6">
                            <img src="{{asset('images/content/index-img-02.jpg')}}" class="w-sm-100" alt="">
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!--//section services -->	

    <div class="section">
		<div class="row no-gutters row-shift">
			<div class="col-lg-6 col-shift-right">
				<div class="container-shift-left">
					<div class="title-wrap">
						<h2 class="double-title double-title--white double-title--vcenter" data-title="News"><span>Publicaciones</span></h2>
					</div>
					<div class="blog-post-sm-vertical">
						<div class="blog-post-sm">
							<div class="blog-post-sm-photo"><img src="{{asset('images/content/noticia-3.jpg')}}" alt="" class="img-fluid"></div>
							<div class="blog-post-sm-text">
								<div class="blog-post-sm-date">Junio 2, 2024</div>
								<div class="blog-post-sm-title"><a href="noticia-3.html">Plasma Rico en Plaquetas (PRP): Innovación en la Medicina Regenerativa...</a></div>
								<a href="#" class="blog-post-sm-readmore">...</a>
							</div>
						</div>
						<div class="blog-post-sm">
							<div class="blog-post-sm-photo"><img src="{{asset('images/content/noticia-2.jpg')}}" alt="" class="img-fluid"></div>
							<div class="blog-post-sm-text">
								<div class="blog-post-sm-date">Junio 3, 2024</div>
								<div class="blog-post-sm-title"><a href="noticia-2.html">Dengue: Cómo Cuidarse, Prevenir y Detectar esta Enfermedad</a></div>
								<a href="#" class="blog-post-sm-readmore">...</a>
							</div>
						</div>
						<div class="blog-post-sm">
							<div class="blog-post-sm-photo"><img src="{{asset('images/content/noticia-1.jpg')}}" alt="" class="img-fluid"></div>
							<div class="blog-post-sm-text">
								<div class="blog-post-sm-date">Junio 7, 2024</div>
								<div class="blog-post-sm-title"><a href="noticias-1.html">Cambio en los valores de referencia de Glucemia Basal...</a></div>
								<a href="#" class="blog-post-sm-readmore">...</a>
							</div>
						</div>
					</div>

				</div>
			</div>
			<div class="col-lg-6 col-shift-left mt-4 mt-md-5 mt-lg-2">
				<div class="container-shift-right">
					<div class="title-wrap text-center text-md-left">
						<h2 class="h1">Nuestro <span class="theme-color">Laboratorio</span></h2>
					</div>
				</div>
				<div class="mt-2 mt-md-3 mt-lg-4">
					<img src="{{asset('images/content/banner-right.jpg')}}" alt="" class="w-sm-100">
					<div class="over-image-counter pos-left">
						<div class="d-flex w-100 justify-content-between">
							<div class="counter-box-sm counted">

								<div class="counter-box-sm-text">Medicina Regenerativa</div>
							</div>
							<div class="counter-box-sm counted">

								<div class="counter-box-sm-text">Analisis Clínicos</div>
							</div>
							<div class="counter-box-sm counted">

								<div class="counter-box-sm-text">Bacteriología         </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection