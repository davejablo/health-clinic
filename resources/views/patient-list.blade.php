@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="container">
                @foreach($patientProfiles as $patientProfile)
                <div class="list-group m-2 pt-2">
                    <div class="list-group-item list-group-item-action">
                        <div class="row">

                            <div class="col-sm m-0">
                                <div class="text-center">
                                    <img src="{{$patientProfile->profileImage()}}" class="rounded w-50 img-thumbnail pb-2" alt="">
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="text-center">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Surname</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">{{$patientProfile->id}}</th>
                                            <td>{{$patientProfile->name}}</td>
                                            <td>{{$patientProfile->surname}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="text-center mt-lg-5">
                                    <a href="{{url('/home/patients/'.$patientProfile->id)}}" class="btn btn-outline-primary btn-lg">Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{$patientProfiles->links()}}
        </div>
    </div>
@endsection
