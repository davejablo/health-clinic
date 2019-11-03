@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">My profile</div>
                    <div class="card-body">
                        Profile Details
                        <h1>Name: {{Auth::user()->patientProfile->name}}</h1>
                        <h1>Surname: {{Auth::user()->patientProfile->surname}}</h1>
                        <h1>BirthDate: {{Auth::user()->patientProfile->getBirthDate() }}</h1>
                        <h1>Age: {{Auth::user()->patientProfile->getAge()}}</h1>
                        <h1>Pesel: {{Auth::user()->patientProfile->pesel ?? 'None'}}</h1>
                        @switch(Auth::user()->patientProfile->gender)
                            @case(1)
                            <h1>Gender: Male</h1>
                            @break
                            @case(0)
                            <h1>Gender: Female</h1>
                            @break
                            @case(2)
                            <h1>Gender: other</h1>
                            @break
                        @endswitch
                        <h1>Phone: {{Auth::user()->patientProfile->phone}}</h1>
                        <h1>Locality: {{Auth::user()->patientProfile->locality}}</h1>
                        <h1>Address: {{Auth::user()->patientProfile->street ?? 'None'}}</h1>
                        <a class="btn btn-success" href="/home/profile/patient/{{Auth::user()->patientProfile->id}}/edit">Edit profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
