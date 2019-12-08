<?php


namespace App\Http\Controllers;


use App\Appointment;
use App\Prescription;

class PrescriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function createPrescription(){
        $data = request()->validate([
            'disease' => 'required',
            'medicines' => 'required',
            'description' => 'required',
            'appointment_id' => 'required'
        ]);

        dd($data);

        $appointment = Appointment::all()
            ->where('id', $data['appointment_id'])->first();

        $prescription = Prescription::create([
            'description' => $data['description'],
            'appointment_id' => $data['appointment_id']
        ]);

        $prescription->medicines()->attach($data['medicines']);

        $sample = array(
            'appointment_id' => $data['appointment_id'],
            'disease_id' => $data['disease'],
            'is_closed' => true
        );

        $appointment->update($sample);
//        $appointment->prescription()->save($prescription);

        return redirect(route('doctor-appointments'))->with('message', 'Prescription created successful without errors');
    }
}