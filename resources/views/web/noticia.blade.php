@extends('web.layout.plantilla')

@section('content')
<div class="site-content-contain">
    <div id="content">
        <div class="section mt-0 tt-blog-posts-page">
            <div class="page-title tt-bc-wrapper breadcrumbs-wrap mb-2 mb-md-3 mb-lg-4">
                <div class="container">
                    <div class="breadcrumbs">
                        <a class="home-link" href="{{route('web.inicio')}}">Inicio</a>
                        <a href="{{route('web.actualidad')}}">Actualidad</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" style="margin-top: 0px;">
            <div class="container">
                <div class="row">
                    <div class="content-area col-lg-9 aside">
                        <article id="post-99" class="tt-single-post blog-post blog-post-single">
                            <div class="post-image">

                                <img width="800" height="453" src="{{asset('storage/'.$noticia->imagen)}}" /> </div>

                            <div class="blog-post-info">

                                <div>
                                    <h1 class="post-title">{{$noticia->titulo}}</h1>
                                    <div class="post-meta">
                                    </div>
                                </div>
                            </div>
                            <div class="post-teaser">
                                {!! $noticia->descripcion !!}
                            </div>

                        </article>

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
@endsection