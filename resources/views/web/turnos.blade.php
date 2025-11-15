@extends('web.layout.plantilla')

@section('content')
    <div class="section mt-0 bg-grey">
        <div class="container">
            <div class="title-wrap text-center">
                <h1>Reservá tu turno</h1>
                <div class="h-decor"></div>
                <p class="mt-3 mb-0">
                    Desde aquí podés elegir uno de los turnos disponibles cargados por nuestro equipo. Completá tus datos y
                    recibirás la confirmación por mail o WhatsApp.
                </p>
            </div>
        </div>
    </div>

    <div class="section pt-0">
        <div class="container">
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if ($errors->any() && ! session('status'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Ups.</strong> Revisá los datos del formulario y volvé a intentar.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="row">
                <div class="col-lg-7">
                    <div class="card bg-light h-100">
                        <div class="card-body">
                            <div class="title-wrap">
                                <h3 class="h4 mb-1">Turnos disponibles</h3>
                                <div class="h-decor"></div>
                            </div>
                            @if ($turnosDisponibles->isEmpty())
                                <p class="mb-0">
                                    Por el momento no hay turnos online. Escribinos a
                                    <a href="https://api.whatsapp.com/send?phone=543436224990&text=Hola" target="_blank" rel="noopener">
                                        WhatsApp
                                    </a>
                                    o llamanos al <a href="tel:543436224990">0343-6224990</a>.
                                </p>
                            @else
                                @php
                                    $turnosAgrupados = $turnosDisponibles->groupBy(fn ($turno) => $turno->inicio->format('Y-m-d'));
                                @endphp

                                @foreach ($turnosAgrupados as $fecha => $turnosDelDia)
                                    @php
                                        $fechaCarbon = \Illuminate\Support\Carbon::parse($fecha)->locale(app()->getLocale());
                                    @endphp
                                    <div class="mb-3 {{ !$loop->last ? 'pb-3 border-bottom' : '' }}">
                                        <h5 class="text-uppercase text-muted small mb-2">
                                            {{ $fechaCarbon->translatedFormat('l d \\de F') }}
                                        </h5>
                                        <ul class="marker-list-md mb-0">
                                            @foreach ($turnosDelDia as $turno)
                                                <li class="d-flex justify-content-between align-items-center">
                                                    <span>
                                                        <strong>{{ $turno->inicio->format('H:i') }} hs</strong>
                                                        <span class="text-muted"> &mdash; {{ $turno->titulo }}</span>
                                                    </span>
                                                    <span class="badge badge-success">Libre</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 mt-4 mt-lg-0">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="title-wrap">
                                <h3 class="h4 mb-1">Solicitar turno</h3>
                                <div class="h-decor"></div>
                            </div>
                            <form action="{{ route('web.turnos.reservar') }}" method="POST" class="mt-3">
                                @csrf
                                <div class="form-group">
                                    <label for="turno_id">Horarios</label>
                                    <select name="turno_id" id="turno_id" class="form-control @error('turno_id') is-invalid @enderror"
                                        {{ $turnosDisponibles->isEmpty() ? 'disabled' : '' }}>
                                        <option value="">Seleccioná un turno</option>
                                        @foreach ($turnosDisponibles as $turno)
                                            <option value="{{ $turno->id }}" @selected(old('turno_id') == $turno->id)>
                                                {{ $turno->inicio->format('d/m H:i') }} hs · {{ $turno->titulo }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('turno_id')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nombre">Nombre y apellido</label>
                                    <input type="text" name="nombre" id="nombre"
                                        class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}"
                                        placeholder="Ej: María López">
                                    @error('nombre')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="dni">DNI (opcional)</label>
                                    <input type="text" name="dni" id="dni" class="form-control @error('dni') is-invalid @enderror"
                                        value="{{ old('dni') }}" placeholder="Ej: 30.123.456">
                                    @error('dni')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="correo">Correo electrónico</label>
                                    <input type="email" name="correo" id="correo"
                                        class="form-control @error('correo') is-invalid @enderror" value="{{ old('correo') }}"
                                        placeholder="nombre@correo.com">
                                    @error('correo')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="celular">Celular</label>
                                    <input type="text" name="celular" id="celular"
                                        class="form-control @error('celular') is-invalid @enderror" value="{{ old('celular') }}"
                                        placeholder="Ej: +54 343 6224990">
                                    @error('celular')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="comentario">Comentario (opcional)</label>
                                    <textarea name="comentario" id="comentario" rows="3"
                                        class="form-control @error('comentario') is-invalid @enderror"
                                        placeholder="Contanos si necesitás algo en particular.">{{ old('comentario') }}</textarea>
                                    @error('comentario')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-gradient btn-block"
                                    {{ $turnosDisponibles->isEmpty() ? 'disabled' : '' }}>
                                    Reservar turno
                                </button>
                                @if ($turnosDisponibles->isEmpty())
                                    <p class="small mt-2 text-muted mb-0">
                                        Dejanos tu consulta mediante WhatsApp o llamanos para asignarte un espacio.
                                    </p>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

