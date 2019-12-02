<?php


namespace App\Http\Controllers;


use App\Appointment;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function selectDate($doctorId){
        return view('select-date', compact('doctorId'));
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

        return redirect(route('doctor-list'));
    }

}