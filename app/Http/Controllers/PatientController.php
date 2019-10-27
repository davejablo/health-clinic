<?php


namespace App\Http\Controllers;


class PatientController extends Controller
{
    public function showProfile(){
        return view('profiles.patient-profile');
    }
}