<?php

namespace App\Http\Controllers;

use App\DoctorSpecialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->hasRole('ROLE_DOCTOR'))
        {
            $doctorProfile = Auth::user()->doctorProfile;
            $myAppointments = Auth::user()->doctorProfile->getDoctorOpenedAppointments($doctorProfile->id);
            return view('home', compact('myAppointments'));
        }
        return view('home');
    }


}
