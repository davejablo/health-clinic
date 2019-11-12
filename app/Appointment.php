<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Appointment extends Model
{
    use Notifiable;

    protected $fillable = [
        'doctor_profile_id', 'patient_profile_id', 'symptom', 'is_closed'
    ];
}