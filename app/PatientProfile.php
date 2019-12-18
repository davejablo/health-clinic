<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PatientProfile extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'phone', 'locality', 'user_id', 'gender', 'birthDate', 'pesel', 'street', 'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function checkAppointments($doctorId, $patientProfileId, $selectedDate ){
        $object = Appointment::all()
            ->where('patient_profile_id', $patientProfileId)
            ->where('doctor_profile_id', $doctorId)
            ->where('appointment_date', $selectedDate->toDateString())
            ->where('is_closed', 0)
            ->first();
        return $object;
    }

    public function  getPatientOpenedAppointments($id){
        $openedAppointments = Appointment::where('patient_profile_id', $id)
            ->where('is_closed', false)
            ->orderBy('appointment_date', 'asc')
            ->paginate(5);
        return $openedAppointments;
    }

    public function  getPatientClosedAppointments($id){
        $closedAppointments = Appointment::where('patient_profile_id', $id)
            ->where('is_closed', true)
            ->orderBy('appointment_date', 'asc')
            ->paginate(5);
        return $closedAppointments;
    }


    public function profileImage(){
        $imagePath = ($this->image) ? $this->image : 'uploads/profile_placeholder.jpg';
        return '/storage/'. $imagePath;
    }

    public function appointments(){
        return $this->belongsToMany('App\Appointment', 'appointments', 'patient_profile_id', 'appointment_id');
    }

    public function doctors(){
        return $this->belongsToMany('App\DoctorProfile', 'appointments', 'patient_profile_id', 'doctor_profile_id');
    }

    public function getAge(){
        return $age = Carbon::parse($this->birthDate)->age;
    }

    public function getBirthDate(){
        return $birthDate = Carbon::parse($this->birthDate)->format('d/m/Y');
    }
}
