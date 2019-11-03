@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Profil: {{$patientProfile->name.' '.$patientProfile->surname}}</div>
                    <div class="card-body">
                        Profile Details
                        <h1>Name:{{$patientProfile->name}}</h1>
                        <h1>Surname:{{$patientProfile->surname}}</h1>
                        <h1>BirthDate:{{$patientProfile->getBirthDate()}}</h1>
                        <h1>Age: {{$patientProfile->getAge()}}</h1>
                        <h1>Pesel:{{$patientProfile->pesel ?? 'None'}}</h1>
                        @switch($patientProfile->gender)
                            @case(1)
                            <h1>Gender: Male</h1>
                            @break
                            @case(0)
                            <h1>Gender: Female</h1>
                            @break
                            @case(2)
                            <h1>Gender: Other</h1>
                            @break
                        @endswitch
                        <h1>Phone:{{$patientProfile->phone}}</h1>
                        <h1>Locality:{{$patientProfile->locality}}</h1>
                        <h1>Address:{{$patientProfile->street ?? 'None'}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection