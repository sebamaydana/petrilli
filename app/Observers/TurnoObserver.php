<?php

namespace App\Observers;

use App\Mail\TurnoReservadoMail;
use App\Models\Turno;
use Illuminate\Support\Facades\Mail;

class TurnoObserver
{
	/**
	 * Handle the Turno "created" event.
	 */
	public function created(Turno $turno): void
	{
		// Enviar correo al paciente si hay correo cargado
		if (filled($turno->correo)) {
			Mail::to($turno->correo)->send(new TurnoReservadoMail($turno, true));
		}

		// Enviar correo a la casilla del laboratorio
		Mail::to('petrillilaboratorio@gmail.com')->send(new TurnoReservadoMail($turno, false));
	}
}


