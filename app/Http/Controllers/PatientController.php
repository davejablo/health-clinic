<?php


namespace App\Http\Controllers;


class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showProfile(){
        return view('profiles.patient-profile');
    }
}