<?php


namespace App\Http\Controllers;


use App\Appointment;

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function formAppointment($doctorId){
        return view('appointment', compact('doctorId'));
    }

    public function createAppointment(){
        $data = request()->validate([
            'symptom' => 'required',
            'doctorProfile_id' => '',
            'patientProfile_id' => '',
        ]);

        \App\Appointment::create($data);

        return redirect(route('doctor-list'));
    }

}