<?php


namespace App\Http\Controllers;


use App\Appointment;
use App\Disease;
use App\DoctorProfile;
use App\Medicine;
use App\PatientProfile;
use Carbon\Carbon;
use Facade\FlareClient\Http\Exceptions\NotFound;
use Illuminate\Support\Facades\Redirect;

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function selectDate($doctorId){

        $doctor = DoctorProfile::find($doctorId);
        $doctorPlans = $doctor->plans;
        $weekMap = [
            0 => 'Niedziela',
            1 => 'Poniedziałek',
            2 => 'Wtorek',
            3 => 'Środa',
            4 => 'Czwartek',
            5 => 'Piątek',
            6 => 'Sobota',
        ];
        return view('select-date', compact('doctorId', 'doctorPlans', 'weekMap'));
    }

    public function formAppointment($doctorId)
    {
        $data = request()->validate([
            'doctorId' => '',
            'date' => '',
            'hour' => ''
        ]);

//        dd($data);

        $date = $data['date'];
        $hour = $data['hour'];

        return view('appointment', compact('doctorId', 'date', 'hour'));
    }

    public function createAppointment(){
        $data = request()->validate([
            'doctor_profile_id' => 'required',
            'patient_profile_id' => 'required',
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required',
            'symptom' => 'required',
        ]);

        $appointmentToInsert = Appointment::where('appointment_date', $data['appointment_date'])
            ->where('appointment_time', $data['appointment_time'])
            ->where('doctor_profile_id', $data['doctor_profile_id'])
            ->get();

        if (($appointmentToInsert->isEmpty()))
        {
            Appointment::create($data);
            return Redirect::route('doctor-list')->with('message', 'Your appointment is succesfully scheduled on '.Carbon::parse($data['appointment_date'])->format('d-m-Y').' at '.$data['appointment_time']);
        }
        else
            return Redirect::route('doctor-list')->with('message', 'This appointment already exist');
    }

    public function showAppointmentDetail($appointment_id){
        $appointment = Appointment::all()
            ->where('id', $appointment_id)->first();
        if ($appointment){
        $patientProfile = PatientProfile::findOrFail($appointment->patient_profile_id);
        if (!$appointment->is_closed)
        {
            $diseases  = Disease::all();
            $medicines = Medicine::all();

            return view('appointment-detail', compact('appointment', 'patientProfile', 'diseases', 'medicines'));
        }
        else
            $doctorProfile = DoctorProfile::findOrFail($appointment->doctor_profile_id);
            $disease = $appointment->disease;
            $prescription = $appointment->prescription;
            $medicines = $prescription->medicines;
            $totalPrice = 0;
            foreach ($medicines as $medicine){
                $totalPrice += $medicine->price;
            }

//        dd($disease, $prescription, $medicines);
        return view('appointment-closed-detail', compact('appointment','patientProfile', 'doctorProfile', 'disease', 'prescription', 'medicines', 'totalPrice'));
        }
        return Redirect::back()->with('message', 'This appointment does not exist in current list');
    }

}