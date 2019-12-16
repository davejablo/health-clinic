<?php

namespace App;

use App\Mail\AppointmentConfirmationMail;
use Carbon\Carbon;
use http\Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class Appointment extends Model
{
    use Notifiable;

    protected $fillable = [
        'id', 'doctor_profile_id', 'patient_profile_id', 'disease_id', 'appointment_date', 'appointment_time', 'symptom', 'is_closed'
    ];

    protected static function boot()
    {
        parent::boot();
        static::created(function ($appointment){
            try{
                $patientProfile = PatientProfile::where('id', $appointment->patient_profile_id)->first();
                $doctorProfile = DoctorProfile::where('id', $appointment->doctor_profile_id)->first();
                $specialization = DoctorSpecialization::where('id', $doctorProfile->doctor_specialization_id)->first();
            } catch (Exception $exception){
                report($exception);
                return Redirect::back()->with('message', 'Something went wrong during mail confirmation');
            }
            $date = Carbon::parse($appointment->appointment_date)->format('d-m-Y');
            $hour = Carbon::parse($appointment->appointment_time)->format('H:i');
            $email = $patientProfile->user->email;
            $name = $patientProfile->user->name;
            $doctorName = $doctorProfile->name;
            $doctorSurname = $doctorProfile->surname;
            $specializationName = $specialization->name;

            Mail::to($email)->send(new AppointmentConfirmationMail($date, $hour, $name, $doctorName, $doctorSurname, $specializationName));
        });
    }

    public function disease()
    {
        return $this->belongsTo('App\Disease');
    }

    public function prescription()
    {
        return $this->hasOne('App\Prescription');
    }



//    public function patients(){
//        return $this->belongsToMany('App\PatientProfile', 'appointments', 'appointment_id', 'patient_profile_id');
//    }

//    public function doctors(){
//        return $this->belongsToMany('App\DoctorProfile', 'appointments', 'appointment_id', 'doctor_profile_id');
//    }
}