@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Appointment</div>
                    <h3>All data: {{$doctorId}}, {{$date}}, {{$hour}}</h3>
                    <div class="card-body justify-content-center">
                        <form action="/home/doctors/{{$doctorId ?? ''}}/appointment/create" method="POST">
                            @csrf
                            <input type="hidden" value="{{$doctorId}}" name="doctor_profile_id">
                            <input type="hidden" value="{{Auth::user()->patientProfile->id}}" name="patient_profile_id">
                            <input type="hidden" value="{{$date}}" name="appointment_date">
                            <input type="hidden" value="{{$hour}}" name="appointment_time">
                            <label for="symptom" type="text">Actual symptoms</label>
                            <textarea class="form-control" id="symptom" name="symptom" rows="4" required></textarea>
                            <div class="form-group row m-2">
                                <div class="col-md-6 offset-md-4">
                                    <button class="btn btn-warning" type="submit">Sign In</button>
                                </div>
                            </div>
                        </form>
                        <div class="container">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection