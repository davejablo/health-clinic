@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center text-info"><h4>Doctor's plan for {{$selectedDate->format('d/m/y')}}</h4></div>
                    <div class="card-body">
            @csrf
            <div class="form-group">
                <input class="form-control" type="hidden" id="doctorProfile_id" name="doctorProfile_id" value={{$doctorId ?? ''}}>
                <input class="form-control" type="hidden" id="patientProfile_id" name="patientProfile_id" value={{Auth::user()->patientProfile->id}}>
                    <div class="container-fluid justify-content-center">
                        <div class="text-center">
                            <h5 class="alert-link">Doctor is available from {{$dayPlan->from_hour}} to {{$dayPlan->to_hour}}</h5>
                        </div>
                        @foreach($dayHours as $dayHour)
                            @if(in_array($dayHour, $busyHours))
                                    <div class="card text-center card border-danger mb-3">
                                        <div class="card-header text-danger alert-danger alert-link">{{ $dayHour }}</div>
                                        <div class="card-body">
                                            <h3>This appointment is occupied</h3>
                                        </div>
                                    </div>
                            @else
                                <div class="card text-center card border-success mb-3">
                                    <div class="card-header alert-link alert-success">{{ $dayHour }}</div>
                                    <div class="card-body">
                                        <form action="/home/doctors/{{$doctorId}}/appointment" method="GET">
                                            <input type="hidden" value="{{$doctorId}}" name="doctorId">
                                            <input type="hidden" value="{{$selectedDate}}" name="date">
                                            <input type="hidden" value="{{$dayHour}}" name="hour">
                                            <button class="btn btn-primary" type="submit">Make Appointment</button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection