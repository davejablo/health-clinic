<?php

namespace App\Http\Controllers;

use App\DoctorProfile;
use App\DoctorSpecialization;

class DoctorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showProfile(){
        return view('profiles.doctor-profile');
    }

    public function showDoctors(){
        $doctorProfiles = DoctorProfile::all();
        return view('doctor-list', compact('doctorProfiles'));
    }

    public function showDoctor($doctorId){
        $doctorProfile = DoctorProfile::findOrFail($doctorId);
        return view('profiles.doctor-profile-public', compact('doctorProfile'));
    }

    public function editDoctor($doctorId){
        $specializations = DoctorSpecialization::all();
        $doctorProfile = DoctorProfile::findOrFail($doctorId);
        return view('profiles.doctor-profile-edit', compact('doctorProfile', 'specializations'));
    }

    public function updateDoctor(){
        $data = request()->validate([
            'name' => '',
            'surname'=> '',
            'email'=> '',
            'locality'=> '',
            'specialization_id'=> '',
            'street'=> '',
            'phone'=> '',
            'gender'=> '',
            'birthDate'=> '',
        ]);
        auth()->user()->doctorProfile->update($data);

        return redirect('home/profile/doctor');
    }
}