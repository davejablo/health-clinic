<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Appointment extends Model
{
    use Notifiable;

    protected $fillable = [
        'appointment_id','doctor_profile_id', 'patient_profile_id','appointment_date','appointment_time', 'symptom', 'is_closed'
    ];

//    public function patients(){
//        return $this->belongsToMany('App\PatientProfile', 'appointments', 'appointment_id', 'patient_profile_id');
//    }
//
//    public function doctors(){
//        return $this->belongsToMany('App\DoctorProfile', 'appointments', 'appointment_id', 'doctor_profile_id');
//    }
}