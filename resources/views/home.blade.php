@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('message'))
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ Session::get('message') }}
        </div>
    @endif
        @if(Auth::user()->hasRole('ROLE_PATIENT'))
            <div class="card">
                <div class="card-header text-center text-info"><h1>Our Specializations</h1></div>
                <div class="row justify-content-center pb-3 pt-3">
                    <div class="col-3">
                        <a href="/home/doctors/specialization/1">
                            <img src="/images/profile_placeholder.jpg" alt="No Image" class="img-fluid">
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="/home/doctors/specialization/2">
                            <img src="/images/profile_placeholder.jpg" alt="No Image" class="img-fluid">
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="/home/doctors/specialization/3">
                            <img src="/images/profile_placeholder.jpg" alt="No Image" class="img-fluid">
                        </a>
                    </div>
                </div>
                <div class="row justify-content-center pb-3">
                    <div class="col-3">
                        <a href="/home/doctors/specialization/4">
                            <img src="/images/profile_placeholder.jpg" alt="No Image" class="img-fluid">
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="/home/doctors/specialization/5">
                            <img src="/images/profile_placeholder.jpg" alt="No Image" class="img-fluid">
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="/home/doctors/specialization/6">
                            <img src="/images/profile_placeholder.jpg" alt="No Image" class="img-fluid">
                        </a>
                    </div>
                </div>

                <div class="row justify-content-center pb-3">
                    <div class="col-3">
                        <a href="/home/doctors/specialization/7">
                            <img src="/images/profile_placeholder.jpg" alt="No Image" class="img-fluid">
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="/home/doctors/specialization/8">
                            <img src="/images/profile_placeholder.jpg" alt="No Image" class="img-fluid">
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="/home/doctors/specialization/9">
                            <img src="/images/profile_placeholder.jpg" alt="No Image" class="img-fluid">
                        </a>
                    </div>
                </div>

                <div class="row justify-content-center m-2 pb-3">
                    <div class="justify-content-center">
                        <a class="btn btn-success" href="/home/doctors">Show all specializations</a>
                    </div>
                </div>
            </div>
        @elseif(Auth::user()->hasRole('ROLE_DOCTOR'))
                @if(Session::has('message'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{ Session::get('message') }}
                    </div>
                @endif
        <div class="card">
            <div class="card-header text-center text-info"><h1>Upcoming Appointments</h1></div>
        @if($myAppointments ?? '')
                    @foreach($myAppointments ?? '' as $myAppointment)
                        <div class="list-group m-2 pt-2">
                            <a href="{{url('/home/profile/doctor/appointments/'.$myAppointment->id)}}" class="list-group-item list-group-item-action active">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Appointment date: {{$myAppointment->appointment_date}}</h5>
                                    <small>{{$myAppointment->created_at->diffForHumans()}}</small>
                                    @if(!$myAppointment->is_closed)
                                        <span class="badge badge badge-success">Opened</span>
                                        @else
                                        <span class="badge badge badge-danger">Closed</span>
                                    @endif
                                </div>
                                <p class="mb-1">{{\Carbon\Carbon::parse($myAppointment->appointment_time)->format('H:i')}}</p>
                                <small>{{$myAppointment->symptom}}</small>
                            </a>
                        </div>
                    @endforeach
                        <div class="row justify-content-center m-2 pb-3">
                            <div class="justify-content-center">
                                <a class="btn btn-secondary" href="{{route('doctor-appointments')}}">Show closed appointments</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center">
                                {{$myAppointments->links()}}
                            </div>
                        </div>
                @else
                    <div class="alert alert-warning" role="alert">
                        There are no upcoming appointments.
                    </div>
        </div>
        @endif

        @elseif(Auth::user()->hasRole('ROLE_ADMIN'))
            <div class="card">
                <div class="card-body">
                    You are logged in as an admin !
                    Hi Boss <3
                </div>
            </div>

        @endif
</div>
@endsection
