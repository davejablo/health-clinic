@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{ Session::get('message') }}
            </div>
        @endif
        <div class="row justify-content-center">
                    <div class="container">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">E-Mail</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($doctorProfiles as $doctorProfile)
                            <tr>
                                <th scope="row">{{$doctorProfile->id}}</th>
                                <td>{{$doctorProfile->name.' '. $doctorProfile->surname}}</td>
                                <td>{{$doctorProfile->user->email}}</td>
                                <td>{{$doctorProfile->phone}}</td>
                                <td>
                                    <a href="{{url('/home/doctors/'.$doctorProfile->id)}}" class="btn btn-outline-primary btn-sm">Profile</a>
                                    <a href="{{url('/home/doctors/'.$doctorProfile->id.'/date')}}" class="btn btn-success btn-sm">Appointment</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
        </div>
    </div>
@endsection
