@extends('web.layout.plantilla')

@section('content')
<div class="site-content-contain">
    <div id="content">
        <div class="section mt-0 tt-blog-posts-page">
            <div class="page-title tt-bc-wrapper breadcrumbs-wrap mb-2 mb-md-3 mb-lg-4">
                <div class="container">
                    <div class="breadcrumbs"><a class="home-link" href="{{route('web.inicio')}}">Inicio</a> <a
                            href="actualidad.html">Actualidad</a></div>
                </div>
            </div>
        </div>
        <div class="section" style="margin-top: 0px;">
            <div class="container">
                <div class="row">
                    <div class="content-area col-lg-9 aside">

                        <div class="blog-post">
                            <div class="blog-post-info">
                                <div class="post-date">7<span>JUN</span></div>
                                <div>
                                    <h2 class="post-title"><a href="noticia-1.html">Cambio en los valores de referencia
                                            de Glucemia Basal</a></h2>
                                    <div class="post-meta">
                                        <div class="post-meta-author">por <a href="#"><i>Petrilli Laboratorio</i></a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="post-image">
                                <a href="noticia-1.html"><img src="{{asset('images/content/noticia-1.jpg')}}" alt=""></a>
                                <div class="post-link-wrapper">
                                    <div class="vert-wrap">
                                        <div class="vert"><a href="#" class="post-link"><i
                                                    class="icon-link-symbol"></i>www.petrillilab.com.ar</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="post-teaser">En 2003 la Asociación Americana de Diabetes (ADA) disminuyó el
                                límite de la glucosa en ayunas de 110 mg/dl a 100 mg/dl. En enero de 2023 la Sociedad
                                Argentina de Diabetes (SAD), publicó el documento adjunto de opinión […]</div>
                            <div class="mt-3 mt-lg-4"><a href="noticia-1.html" class="btn btn-sm btn-hover-fill"><i
                                        class="icon-right-arrow"></i><span>Leer mas</span><i
                                        class="icon-right-arrow"></i></a></div>
                        </div>
                        <div class="blog-post">
                            <div class="blog-post-info">
                                <div class="post-date">2<span>JUN</span></div>
                                <div>
                                    <h2 class="post-title"><a href="noticia-2.html">Dengue: Cómo Cuidarse, Prevenir y
                                            Detectar esta Enfermedad</a></h2>
                                    <div class="post-meta">
                                        <div class="post-meta-author">por <a href="#"><i>Petrilli Laboratorio</i></a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="post-image">
                                <a href="noticia-2.html"><img src="{{asset('images/content/noticia-2.jpg')}}" alt=""></a>
                                <div class="post-link-wrapper">
                                    <div class="vert-wrap">
                                        <div class="vert"><a href="#" class="post-link"><i
                                                    class="icon-link-symbol"></i>www.petrillilab.com.ar</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="post-teaser">El dengue es una enfermedad viral transmitida principalmente por la
                                picadura del mosquito Aedes aegypti. Este mosquito es común en áreas tropicales y
                                subtropicales y puede causar serios problemas de salud pública […]</div>
                            <div class="mt-3 mt-lg-4"><a href="noticia-2.html" class="btn btn-sm btn-hover-fill"><i
                                        class="icon-right-arrow"></i><span>Leer mas</span><i
                                        class="icon-right-arrow"></i></a></div>
                        </div>

                        <div class="blog-post">
                            <div class="blog-post-info">
                                <div class="post-date">5<span>JUN</span></div>
                                <div>
                                    <h2 class="post-title"><a href="noticia-3.html">Plasma Rico en Plaquetas (PRP):
                                            Innovación en la Medicina Regenerativa</a></h2>
                                    <div class="post-meta">
                                        <div class="post-meta-author">por <a href="#"><i>Petrilli Laboratorio</i></a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="post-image">
                                <a href="noticia-3.html"><img src="{{asset('images/content/noticia-3.jpg')}}" alt=""></a>
                                <div class="post-link-wrapper">
                                    <div class="vert-wrap">
                                        <div class="vert"><a href="#" class="post-link"><i
                                                    class="icon-link-symbol"></i>www.petrillilab.com.ar</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="post-teaser">l plasma rico en plaquetas (PRP) es un hemocomponente autólogo que
                                ha ganado reconocimiento en el campo de la medicina regenerativa por sus beneficios
                                terapéuticos y su capacidad para promover la curación de diversos tejidos. […]</div>
                            <div class="mt-3 mt-lg-4"><a href="noticia-3.html" class="btn btn-sm btn-hover-fill"><i
                                        class="icon-right-arrow"></i><span>Leer mas</span><i
                                        class="icon-right-arrow"></i></a></div>
                        </div>

                    </div>
                    <aside id="secondary" class="widget-area tt-blog-sidebar col-lg-3 aside-left mt-6 mt-md-0"
                        role="complementary">
                        <div class="col-md mt-3 mt-md-0">
                            <div class="title-wrap">
                                <h5>Datos de Contacto</h5>
                                <div class="h-decor"></div>
                            </div>
                            <ul class="icn-list-lg">
                                <li><i class="icon-telephone"></i>Telefono: <span class="theme-color"><span
                                            class="text-nowrap">0343-6224990</span>
                                    </span>
                                    <br> Fax: <span class="theme-color"><span class="text-nowrap">0343-6224990</span>
                                    </span>
                                </li>
                                <li><i class="icon-black-envelope"></i><a
                                        href="mailto:info@petrillilab.com.ar">info@petrillilab.com.ar</a></li>
                            </ul>
                        </div>
                        <p></p>
                        <div class="col-md mt-3 mt-md-0">
                            <div class="title-wrap">
                                <h5>Horarios</h5>
                                <div class="h-decor"></div>
                            </div>
                            <ul class="icn-list-lg">
                                <li><i class="icon-clock"></i>
                                    <div>
                                        <div class="d-flex"><span>Lunes</span><span class="theme-color">07:30 -
                                                12:00</span></div>
                                        <div class="d-flex"><span>Martes</span><span class="theme-color">07:30 -
                                                12:00</span></div>
                                        <div class="d-flex"><span>Miercoles</span><span class="theme-color">07:30 -
                                                12:00</span></div>
                                        <div class="d-flex"><span>Jueves</span><span class="theme-color">07:30 -
                                                12:00</span></div>
                                        <div class="d-flex"><span>Viernes</span><span class="theme-color">07:30 -
                                                12:00</span></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                </div>

                </aside>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection