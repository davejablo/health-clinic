@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center text-info"><h4>Appointment</h4></div>
                    <div class="card-body justify-content-center">
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Selected term: {{\Carbon\Carbon::createFromTimeString($date)->format('d/m/Y')}} at {{\Carbon\Carbon::createFromTimeString($hour)->format('H:i')}} o'clock</h4>
                            <p>Write down what is happening (how do you feel, observed symptoms etc.)</p>
                            <hr>
                            <p class="mb-0">Press sign in, to let our specialist take care of you</p>
                        </div>
                        <div class="alert alert-info" role="alert">
                            <form action="/home/doctors/{{$doctorId ?? ''}}/appointment/create" method="POST">
                                @csrf
                                <input type="hidden" value="{{$doctorId}}" name="doctor_profile_id">
                                <input type="hidden" value="{{Auth::user()->patientProfile->id}}" name="patient_profile_id">
                                <input type="hidden" value="{{$date}}" name="appointment_date">
                                <input type="hidden" value="{{$hour}}" name="appointment_time">
                                <label for="symptom" type="text">Actual symptoms</label>
                                <textarea class="form-control" id="symptom" name="symptom" rows="4" required></textarea>
                                <div class="row justify-content-center m-2 pb-1 pt-2">
                                    <div class="justify-content-center">
                                        <button class="btn btn-primary" type="submit">Meet with doctor</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection