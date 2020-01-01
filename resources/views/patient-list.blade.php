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

                            <div class="col-md-5">
                                <div class="row pt-4">
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <div class="col-xs-6 text-center">
                                                <label for="name"><h4>Name</h4></label>
                                                <input type="name" readonly class="form-control text-center" value="{{$patientProfile->name}}" name="name" id="name" placeholder="name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <div class="col-xs-6 text-center">
                                                <label for="surname"><h4>Surname</h4></label>
                                                <input type="surname" readonly class="form-control text-center" value="{{$patientProfile->surname}}" name="surname" id="surname" placeholder="surname">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="form-group">
                                            <div class="col-xs-6 text-center">
                                                <label for="locality"><h4>Locality</h4></label>
                                                <input type="locality" readonly class="form-control text-center" value="{{$patientProfile->locality}}" name="locality" id="locality" placeholder="locality">
                                            </div>
                                        </div>
                                    </div>
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
