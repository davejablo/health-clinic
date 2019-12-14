@extends('layouts.app')

@section('content')
    <div class="container">
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
                    @foreach($patientProfiles as $patientProfile)
                        <tr>
                            <th scope="row">{{$patientProfile->id}}</th>
                            <td>{{$patientProfile->name.' '. $patientProfile->surname}}</td>
{{--                            <td>{{$patientProfile->user->email}}</td>--}}
                            <td>{{$patientProfile->phone}}</td>
                            <td>
                                <a href="{{url('/home/patients/'.$patientProfile->id)}}" class="btn btn-outline-primary btn-sm">Profile</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
