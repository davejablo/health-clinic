@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">My profile</div>
                    <div class="card-body">
                        Profile Details
                        <h1>Name:{{Auth::user()->patientProfile->name}}</h1>
                        <h1>Surname:{{Auth::user()->patientProfile->surname}}</h1>
                        <h1>BirthDate:{{Auth::user()->patientProfile->birthDate}}</h1>
                        <h1>Pesel:{{Auth::user()->patientProfile->pesel}}</h1>
                        <h1>Gender:{{Auth::user()->patientProfile->gender}}</h1>
                        <h1>Phone:{{Auth::user()->patientProfile->phone}}</h1>
                        <h1>Locality:{{Auth::user()->patientProfile->locality}}</h1>
                        <h1>Address:{{Auth::user()->patientProfile->street}}</h1>
                        <button class="btn btn-success">Edit profile</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
