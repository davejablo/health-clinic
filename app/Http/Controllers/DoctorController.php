<?php

namespace App\Http\Controllers;

use App\DoctorProfile;

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
}