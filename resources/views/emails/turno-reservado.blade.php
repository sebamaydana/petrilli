<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Reserva de turno</title>
	<style>
		.body {
			font-family: Arial, Helvetica, sans-serif;
			background-color: #f6f8fa;
			margin: 0;
			padding: 24px;
		}
		.container {
			max-width: 640px;
			margin: 0 auto;
			background: #ffffff;
			border-radius: 8px;
			border: 1px solid #e5e7eb;
			overflow: hidden;
		}
		.header {
			padding: 16px 24px;
			border-bottom: 1px solid #e5e7eb;
			display: flex;
			align-items: center;
			gap: 12px;
		}
		.header img {
			display: block;
			height: 40px;
		}
		.content {
			padding: 24px;
			color: #111827;
			line-height: 1.55;
		}
		.h1 {
			margin: 0 0 8px 0;
			font-size: 18px;
		}
		.table {
			width: 100%;
			border-collapse: collapse;
			margin-top: 12px;
			font-size: 14px;
		}
		.table th, .table td {
			text-align: left;
			border-bottom: 1px solid #f3f4f6;
			padding: 8px 0;
		}
		.footer {
			padding: 16px 24px;
			border-top: 1px solid #e5e7eb;
			color: #6b7280;
			font-size: 12px;
		}
	</style>
</head>
<body class="body">
	<div class="container">
		<div class="header">
			<img src="{{ $message->embed(public_path('images/logo.png')) }}" alt="Petrilli Laboratorio">
			<div style="font-weight: 600; font-size: 16px;margin-left: 12px;">Petrilli Laboratorio</div>
		</div>
		<div class="content">
			<p class="h1">
				@if($isPaciente)
					Gracias, hemos recibido tu reserva de turno.
				@else
					Nueva reserva de turno registrada.
				@endif
			</p>
			<p>
				@if($isPaciente)
					Tu reserva quedó <strong>en espera de confirmación</strong>. Te avisaremos cuando sea confirmada.
				@else
					La reserva se encuentra <strong>en espera de confirmación</strong>.
				@endif
			</p>

			@php
				$inicioFmt = \Illuminate\Support\Carbon::parse($turno->inicio)->format('d/m/Y H:i');
			@endphp

			<table class="table">
				<tr>
					<th>Fecha y hora de inicio</th>
					<td>{{ $inicioFmt }}</td>
				</tr>
				<tr>
					<th>Título</th>
					<td>{{ $turno->titulo }}</td>
				</tr>
				<tr>
					<th>Paciente</th>
					<td>{{ $turno->nombre ?: '-' }}</td>
				</tr>
				<tr>
					<th>DNI</th>
					<td>{{ $turno->dni ?: '-' }}</td>
				</tr>
				<tr>
					<th>Celular</th>
					<td>{{ $turno->celular ?: '-' }}</td>
				</tr>
				<tr>
					<th>Correo</th>
					<td>{{ $turno->correo ?: '-' }}</td>
				</tr>
				@if(filled($turno->comentario))
					<tr>
						<th>Comentario</th>
						<td>{{ $turno->comentario }}</td>
					</tr>
				@endif
				<tr>
					<th>Estado</th>
					<td>{{ ucfirst($turno->estado) }}</td>
				</tr>
			</table>

			@if($isPaciente)
				<p style="margin-top:16px;">
					Si los datos no son correctos o deseas modificar tu turno, por favor comunicarse a través de WhatsApp al <a href="https://wa.me/5493436224990">+54 343 6224990</a>.
				</p>
			@endif
		</div>
		<div class="footer">
			Este es un mensaje automático. Por favor no responder a esta casilla.
		</div>
	</div>
</body>
</html>


