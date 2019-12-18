<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppointmentConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *$date, $hour, $email, $name, $doctorName, $doctorSurname, $specializationName
     * @return void
     */
    private $date, $hour, $name, $doctorName, $doctorSurname, $specializationName;

    public function __construct($date, $hour, $name, $doctorName, $doctorSurname, $specializationName)
    {
        $this->date = $date;
        $this->hour = $hour;
        $this->name = $name;
        $this->doctorName = $doctorName;
        $this->doctorSurname = $doctorSurname;
        $this->specializationName = $specializationName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('health.clinic.pro@gmail.com', 'Health-Clinic')
            ->subject('Health-Clinic Appointment Confirmation')
            ->markdown('emails.appointment-confirmation-email', [
                'date' => $this->date,
                'hour' => $this->hour,
                'name' => $this->name,
                'doctorName' => $this->doctorName,
                'doctorSurname' => $this->doctorSurname,
                'specializationName' => $this->specializationName,
            ]);
    }
}
