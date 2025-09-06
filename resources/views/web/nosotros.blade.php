@extends('web.layout.plantilla')

@section('content')
<div class="section mt-0">
    <div class="breadcrumbs-wrap">
        <div class="container">
            <div class="breadcrumbs">
                <a href="{{route('web.inicio')}}">Inicio</a>
                <span>Nosotros</span>
            </div>
        </div>
    </div>
</div>
<!--//section-->
<!--section-->
<div class="section page-content-first">
    <div class="container">
        <div class="text-center mb-2  mb-md-3 mb-lg-4">
            <div class="h-sub theme-color">Acerca de</div>
            <h1>Nosotros</h1>
            <div class="h-decor"></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-center text-lg-left pr-md-4">
                <img src="{{asset('images/content/about-01.jpg')}}" class="w-100" alt="">
                <div class="row mt-3">
                    <div class="col-6">
                        <img src="{{asset('images/content/about-03.jpg')}}" class="w-100" alt="">
                    </div>
                    <div class="col-6">
                        <img src="{{asset('images/content/about-04.jpg')}}" class="w-100" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-3 mt-lg-0">
                <p>

Somos un equipo destinado a mejorar constantemente nuestro trabajo. Involucrados permanentemente con el avance científico y la excelencia-</p>

                <div class="mt-3 mt-md-7"></div>
                <h3>Mision</h3>
                <div class="mt-0 mt-md-4"></div>
                <p>Trabajamos con responsabilidad y calidad pensando en nuestros pacientes. Nos guía el compromiso y la confiabilidad.</p>
                <h3>Vision</h3>
                <div class="mt-0 mt-md-4"></div>
                <p>Acreditar nuestro trabajo logrando mejores servicios para nuestros clientes.</p>
            </div>
        </div>
    </div>
</div>
<!--//section-->

<!--section services -->
<div class="section bg-norepeat bg-md-none section-top-padding" style="background-image: url({{asset('images/bg-top-left.png')}})">
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

<!--section-->
<div class="section page-content-first">
    <div class="container">
        <div class="text-center mb-2  mb-md-3 mb-lg-4">
            <div class="h-sub theme-color">Galeria de Fotos</div>
            <h1>Nuestras Instalaciones</h1>
            <div class="h-decor"></div>
        </div>
    </div>
    <div class="container">
        <div class="text-center mb-3 mb-md-4 max-900">

        </div>
        
        <div class="gallery-wrap">
            <div class="gallery-smiles gallery-isotope" id="gallery">
                <div class="gallery-item category2 category7">
                    <div class="twentytwenty-container">
                        <img src="{{asset('images/content/galeria/instalaciones-01.jpg')}}" alt=""/>
                    </div>
                </div>
                <div class="gallery-item category1 category5 category8">
                    <div class="twentytwenty-container">
                        <img src="{{asset('images/content/galeria/instalaciones-02.jpg')}}" alt=""/>												</div>
                </div>
                <div class="gallery-item category2 category4 category3">
                    <div class="twentytwenty-container">
                        <img src="{{asset('images/content/galeria/instalaciones-03.jpg')}}" alt=""/>												</div>					</div>
                <div class="gallery-item category4 category8 category6">
<div class="twentytwenty-container">
                        <img src="{{asset('images/content/galeria/instalaciones-04.jpg')}}" alt=""/>												</div>
                </div>
                <div class="gallery-item category3 category7">
                    <div class="twentytwenty-container">
                        <img src="{{asset('images/content/galeria/instalaciones-05.jpg')}}" alt=""/>												</div>
                </div>
        <div class="gallery-item category3 category7">
                    <div class="twentytwenty-container">
                        <img src="{{asset('images/content/galeria/instalaciones-06.jpg')}}" alt=""/>												</div>
                </div>	
            <div class="gallery-item category3 category7">
                    <div class="twentytwenty-container">
                        <img src="{{asset('images/content/galeria/instalaciones-07.jpg')}}" alt=""/>												</div>
                </div>
                <div class="gallery-item category1 category8">
                    <div class="twentytwenty-container">
                        <img src="{{asset('images/content/gallery/smile-7-1.jpg')}}" alt=""/>
                        <img src="{{asset('images/content/gallery/smile-7-2.jpg')}}" alt=""/>
                    </div>
                </div>
                <div class="gallery-item category2 category6">
                    <div class="twentytwenty-container">
                        <img src="{{asset('images/content/gallery/smile-8-1.jpg')}}" alt=""/>
                        <img src="{{asset('images/content/gallery/smile-8-2.jpg')}}" alt=""/>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!--//section-->
@endsection