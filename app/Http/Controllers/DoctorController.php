<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\DoctorProfile;
use App\DoctorSpecialization;
use Carbon\Carbon;
use http\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

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

    public function showPlan($doctorId){
        $data = request()->validate([
            'doctorId' => '',
            'selectedDate' => 'required|date|after_or_equal:today'
        ]);

        $selectedDate = Carbon::createFromDate($data['selectedDate']);

        $doctorProfile = DoctorProfile::findOrFail($doctorId);

        $dayPlan = $doctorProfile->getDayPlan($selectedDate);

        if (!$dayPlan){
            return Redirect::back()->with('message', 'Doctor is not available this day. Please select different date');
        }

        $patientProfileId = Auth::user()->patientProfile->id;

        if(Auth::user()->patientProfile->checkAppointments($doctorId, $patientProfileId, $selectedDate)){
            return Redirect::back()->with('message', 'You already have appointment with this doctor on selected date !');
        }

        $busyHours = Appointment::all()
            ->where('appointment_date', $selectedDate->format('Y-m-d'))
            ->where('doctor_profile_id', $doctorId)
            ->pluck('appointment_time')
            ->toArray();

        $dayHours = array();
        for($i = Carbon::parse($dayPlan->from_hour)->subtract('minutes', 30); $i < Carbon::parse($dayPlan->to_hour); $i++)
        {
            array_push($dayHours, $i->addMinutes(30)->format('H:i:s'));
        }

        return view('terms', compact('dayPlan','selectedDate', 'doctorId', 'busyHours', 'dayHours'));
    }
}