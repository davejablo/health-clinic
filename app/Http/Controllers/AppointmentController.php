<?php


namespace App\Http\Controllers;


use App\Appointment;
use App\Disease;
use App\DoctorProfile;
use App\Medicine;
use App\PatientProfile;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function selectDate($doctorId){

        $doctor = DoctorProfile::find($doctorId);
        $doctorPlans = $doctor->plans;
        $weekMap = [
            0 => 'Niedziela',
            1 => 'Poniedziałek',
            2 => 'Wtorek',
            3 => 'Środa',
            4 => 'Czwartek',
            5 => 'Piątek',
            6 => 'Sobota',
        ];
        return view('select-date', compact('doctorId', 'doctorPlans', 'weekMap'));
    }

    public function formAppointment($doctorId)
    {
        $data = request()->validate([
            'doctorId' => '',
            'date' => '',
            'hour' => ''
        ]);

//        dd($data);

        $date = $data['date'];
        $hour = $data['hour'];

        return view('appointment', compact('doctorId', 'date', 'hour'));
    }

    public function createAppointment(){
        $data = request()->validate([
            'doctor_profile_id' => 'required',
            'patient_profile_id' => 'required',
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required',
            'symptom' => 'required',
        ]);

        Appointment::create($data);
        return Redirect::route('doctor-list')->with('message', 'Your appointment is succesfully scheduled on '.Carbon::parse($data['appointment_date'])->format('d-m-Y').' at '.$data['appointment_time']);
    }

    public function showAppointmentDetail($appointment_id){
        $appointment = Appointment::all()
            ->where('id', $appointment_id)->first();

        $patientProfile = PatientProfile::findOrFail($appointment->patient_profile_id);

        $diseases  = Disease::all();
        $medicines = Medicine::all();

        return view('appointment-detail', compact('appointment', 'patientProfile', 'diseases', 'medicines'));
    }

}