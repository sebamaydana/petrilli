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
								<div class="faq-item">
									<a data-toggle="collapse" data-parent="#faqAccordion1" href="#faqItem1" aria-expanded="true">Extracción de Sangre</a>
									<div id="faqItem1" class="collapse show faq-item-content" role="tabpanel">
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
									<div id="faqItem2" class="collapse faq-item-content" role="tabpanel">
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
									<div id="faqItem3" class="collapse faq-item-content" role="tabpanel">
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
									<a data-toggle="collapse" data-parent="#faqAccordion1" href="#faqItem4" aria-expanded="true">Orina 24 horas</a>
									<div id="faqItem4" class="collapse faq-item-content" role="tabpanel">
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
									<a data-toggle="collapse" data-parent="#faqAccordion1" href="#faqItem5" aria-expanded="true">Coprocultivo</a>
									<div id="faqItem5" class="collapse faq-item-content" role="tabpanel">
										<div>
											<p>Durante tres días consecutivos colocar una porción de material fecal.</p> 
											<p>Realizar la defecación espontánea en algún recipiente limpio seleccionando las fracciones más blandas, líquidas, mucosas o sanguinolentas en el envase estéril provisto por el laboratorio.</p>
											<p>Trasvasarla con cuchara descartable al recipiente.</p>
										</div>
									</div>
								</div>

								<div class="faq-item">
									<a data-toggle="collapse" data-parent="#faqAccordion1" href="#faqItem6" aria-expanded="true">Parasitologico Materia Fecal</a>
									<div id="faqItem6" class="collapse faq-item-content" role="tabpanel">
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
	<!--//section-->
@endsection