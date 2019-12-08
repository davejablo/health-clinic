<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class DoctorProfile extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'phone', 'locality', 'user_id', 'gender', 'birthDate', 'specialization_id', 'street'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function doctorSpecialization()
    {
        return $this->belongsTo(DoctorSpecialization::class);
    }

    public function plans()
    {
        return $this->hasMany('App\DoctorDayOfWeekPlan');
    }

    public function getDayPlan($selectedDate){
        $dayNumber = $selectedDate->dayOfWeek;
        return $this->plans()->where('day_of_week', $dayNumber)
            ->first();
    }

    public function  getDoctorOpenedAppointments($id){
        return Appointment::all()
            ->where('doctor_profile_id', $id)
            ->where('is_closed', false);
    }

    public function  getDoctorClosedAppointments($id){
        return Appointment::all()
            ->where('doctor_profile_id', $id)
            ->where('is_closed', true);
    }

//    public function appointments(){
//        return $this->belongsToMany('App\Appointment', 'appointments');
//    }

    public function patients(){
        return $this->belongsToMany('App\PatientProfile', 'appointments', 'doctor_profile_id', 'patient_profile_id');
    }

    public function getAge(){
        return $age = Carbon::parse($this->birthDate)->age;
    }

    public function getBirthDate(){
        return $birthDate = Carbon::parse($this->birthDate)->format('d/m/Y');
    }

}
