<?php


namespace App\Http\Controllers;


use App\Appointment;
use App\DoctorProfile;
use App\PatientProfile;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showProfile(){
        return view('profiles.patient-profile');
    }

    public function showPatients(){
        $patientProfiles = PatientProfile::all();
        return view('patient-list', compact('patientProfiles'));
    }

    public function showPatient($patientId){
        $patientProfile = PatientProfile::findOrFail($patientId);
        return view('profiles.patient-profile-public', compact('patientProfile'));
    }

    public function editPatient($patientId){
        $patientProfile = PatientProfile::findOrFail($patientId);
//        $appointments = $patientProfile->appointments;
        $appointments = Appointment::where('patient_profile_id', $patientId)->get();
//        dd($appointments);

        return view('profiles.patient-profile-edit', compact('patientProfile'));
    }

    public function updatePatient(){
        $data = request()->validate([
            'name' => '',
            'surname'=> '',
            'email'=> '',
            'pesel'=> '',
            'locality'=> '',
            'street'=> '',
            'phone'=> '',
            'gender'=> '',
            'birthDate'=> '',
        ]);
        auth()->user()->patientProfile->update($data);

        return redirect('home/profile/patient');
    }


}