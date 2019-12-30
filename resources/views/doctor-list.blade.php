@extends('layouts.app')

@section('content')
        @if(Session::has('message'))
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{ Session::get('message') }}
            </div>
        @endif
        <div class="row justify-content-center">
                    <div class="container">
                        @foreach($doctorProfiles as $doctorProfile)
                            <div class="list-group m-2 pt-2">
                                    <div class="list-group-item list-group-item-action">
                                        <div class="row">

                                            <div class="col-sm m-0">
                                                <div class="text-center">
                                                        <img src="{{$doctorProfile->profileImage()}}" class="rounded w-50 img-thumbnail pb-2" alt="">
                                                </div>
                                            </div>

                                            <div class="col-sm">
                                                <div class="text-center">
                                                        <table class="table">
                                                            <thead>
                                                            <tr>
                                                                <th scope="col">ID</th>
                                                                <th scope="col">First Name</th>
                                                                <th scope="col">Last Name</th>
                                                                <th scope="col">Specialization</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                <th scope="row">{{$doctorProfile->id}}</th>
                                                                <td>{{$doctorProfile->name}}</td>
                                                                <td>{{$doctorProfile->surname}}</td>
                                                                <td>{{$doctorProfile->doctorSpecialization->name}}</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                </div>
                                            </div>

                                            <div class="col-sm">
                                                <div class="text-center mt-lg-5">
                                                    <a href="{{url('/home/doctors/'.$doctorProfile->id)}}" class="btn btn-outline-primary btn-lg m-2">Profile</a>
                                                    <a href="{{url('/home/doctors/'.$doctorProfile->id.'/date')}}" class="btn btn-success btn-lg">Appointment</a>
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
            {{$doctorProfiles->links()}}
        </div>
    </div>
@endsection




