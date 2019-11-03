@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">My profile</div>
                    <div class="card-body">
                        Profile Details
                        <h1>Name: {{Auth::user()->doctorProfile->name}}</h1>
                        <h1>Surname: {{Auth::user()->doctorProfile->surname}}</h1>
                        <h1>BirthDate: {{Auth::user()->doctorProfile->getBirthDate() }}</h1>
                        <h1>Age: {{Auth::user()->doctorProfile->getAge()}}</h1>
                        <h1>Specialization: {{Auth::user()->doctorProfile->specialization_id ?? 'None'}}</h1>
                        @switch(Auth::user()->doctorProfile->gender)
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
                        <h1>Phone: {{Auth::user()->doctorProfile->phone}}</h1>
                        <h1>Locality: {{Auth::user()->doctorProfile->locality}}</h1>
                        <h1>Address: {{Auth::user()->doctorProfile->street ?? 'None'}}</h1>
                        <a class="btn btn-success" href="/home/profile/doctor/{{Auth::user()->doctorProfile->id}}/edit">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection