<?php


namespace App\Http\Controllers;


use App\Appointment;
use App\DoctorProfile;
use App\PatientProfile;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Intervention\Image\Facades\Image;

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

    public function showPatient(PatientProfile $patientProfile){
        return view('profiles.patient-profile-public', compact('patientProfile'));
    }

    public function editPatient(PatientProfile $patientProfile){
//        $patientProfile = PatientProfile::findOrFail($patientId);
//        $appointments = $patientProfile->appointments;
//        $appointments = Appointment::where('patient_profile_id', $patientId)->get();
//        dd($appointments);

        return view('profiles.patient-profile-edit', compact('patientProfile'));
    }

    public function updatePatient(){
        $data = request()->validate([
            'name' => 'required',
            'surname'=> 'required',
            'phone'=> '',
            'pesel'=> '',
            'locality'=> '',
            'street'=> '',
            'gender'=> 'required',
            'birthDate'=> 'required',
            'image' => '',
        ]);

        if (request('image')){
            $imagePath = request('image')->store('uploads/patient-profiles', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->patientProfile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect('home/profile/patient');
    }


}