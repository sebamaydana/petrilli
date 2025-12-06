<?php

namespace App\Mail;

use App\Models\Turno;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TurnoReservadoMail extends Mailable
{
	use Queueable, SerializesModels;

	public Turno $turno;
	public bool $isPaciente;

	/**
	 * Create a new message instance.
	 */
	public function __construct(Turno $turno, bool $isPaciente = true)
	{
		$this->turno = $turno;
		$this->isPaciente = $isPaciente;
	}

	/**
	 * Build the message.
	 */
	public function build(): self
	{
		$subject = $this->isPaciente
			? 'Reserva de turno recibido - En espera de confirmación'
			: 'Nueva reserva de turno - En espera de confirmación';

		return $this
			->subject($subject)
			->view('emails.turno-reservado', [
				'turno' => $this->turno,
				'isPaciente' => $this->isPaciente,
			]);
	}
}


