@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">My profile</div>
                    <div class="card-body">
                        Profile Details
                        <h1>Name:{{Auth::user()->doctorProfile->name}}</h1>
                        <h1>Surname:{{Auth::user()->doctorProfile->surname}}</h1>
                        <h1>BirthDate:{{Auth::user()->doctorProfile->birthDate}}</h1>
                        <h1>Specialization:{{Auth::user()->doctorProfile->specialization}}</h1>
                        <h1>Gender:{{Auth::user()->doctorProfile->gender}}</h1>
                        <h1>Phone:{{Auth::user()->doctorProfile->phone}}</h1>
                        <h1>Locality:{{Auth::user()->doctorProfile->locality}}</h1>
                        <h1>Address:{{Auth::user()->doctorProfile->street}}</h1>
                        <button class="btn btn-success">Edit profile</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection