@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="container">
                @if(Session::has('message'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{ Session::get('message') }}
                    </div>
                @endif
                @if($myAppointments->count())
                        @foreach($myAppointments as $myAppointment)
                            <div class="list-group m-2">
                                <a href="{{url('/home/profile/doctor/appointments/'.$myAppointment->id)}}" class="list-group-item list-group-item-action active">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Appointment date: {{$myAppointment->appointment_date}}</h5>
                                        <small>{{$myAppointment->created_at->diffForHumans()}}</small>
                                    </div>
                                    <p class="mb-1">{{\Carbon\Carbon::parse($myAppointment->appointment_time)->format('H:i')}}</p>
                                    <small>{{$myAppointment->symptom}}</small>
                                </a>
                            </div>
                            {{--                                <a href="{{url('/home/doctors/'.$doctorProfile->id)}}" class="btn btn-outline-primary btn-sm">Profile</a>--}}
                            {{--                                <a href="{{url('/home/doctors/'.$doctorProfile->id.'/date')}}" class="btn btn-success btn-sm">Appointment</a>--}}
                        @endforeach
                    @else
                        <div class="alert alert-warning" role="alert">
                            There are no upcoming appointments.
                        </div>
                    @endif
            </div>
        </div>
    </div>
@endsection
