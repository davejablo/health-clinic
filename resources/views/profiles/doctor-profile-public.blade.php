@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Profil: {{$doctorProfile->name.' '.$doctorProfile->surname}}</div>
                    <div class="card-body">
                        Profile Details
                        <h1>Name:{{$doctorProfile->name}}</h1>
                        <h1>Surname:{{$doctorProfile->surname}}</h1>
                        <h1>BirthDate:{{$doctorProfile->getBirthDate()}}</h1>
                        <h1>Specialization:{{$doctorProfile->specialization_id ?? 'None'}}</h1>
                        @switch($doctorProfile->gender)
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
                        <h1>Phone:{{$doctorProfile->phone}}</h1>
                        <h1>Locality:{{$doctorProfile->locality}}</h1>
                        <h1>Address:{{$doctorProfile->street ?? 'None'}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection