@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header text-center text-info"><h1>Closed Appointments</h1></div>
            @if($openedAppointments ?? '')
                @foreach($openedAppointments ?? '' as $openedAppointment)
                    <div class="list-group m-2 pt-2">
                        @if(Auth::user()->hasRole('ROLE_DOCTOR'))
                            <a href="{{url('/home/profile/doctor/appointments/'.$openedAppointment->id)}}" class="list-group-item list-group-item-action active">
                                @elseif(Auth::user()->hasRole('ROLE_PATIENT'))
                                    <a href="{{url('/home/profile/patient/appointments/'.$openedAppointment->id)}}" class="list-group-item list-group-item-action active">
                                        @endif
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1">Appointment date: {{$openedAppointment->appointment_date}}</h5>
                                            <small>{{$openedAppointment->created_at->diffForHumans()}}</small>
                                            @if(!$openedAppointment->is_closed)
                                                <span class="badge badge badge-success">Opened</span>
                                            @else
                                                <span class="badge badge badge-danger">Closed</span>
                                            @endif
                                        </div>
                                        <p class="mb-1">{{\Carbon\Carbon::parse($openedAppointment->appointment_time)->format('H:i')}}</p>
                                        <small>{{$openedAppointment->symptom}}</small>
                                    </a>
                            </a>
                    </div>
                @endforeach
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        {{$openedAppointments->links()}}
                    </div>
                </div>
            @else
                <div class="alert alert-warning" role="alert">
                    There are no closed appointments.
                </div>
            @endif
        </div>
    </div>
@endsection
