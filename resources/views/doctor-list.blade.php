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

                                            <div class="col-md-5">
                                                <div class="row pt-4">
                                                    <div class="col-sm">
                                                        <div class="form-group">
                                                            <div class="col-xs-6 text-center">
                                                                <label for="name"><h4>Name</h4></label>
                                                                <input type="name" readonly class="form-control text-center" value="{{$doctorProfile->name}}" name="name" id="name" placeholder="name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm">
                                                        <div class="form-group">
                                                            <div class="col-xs-6 text-center">
                                                                <label for="surname"><h4>Surname</h4></label>
                                                                <input type="surname" readonly class="form-control text-center" value="{{$doctorProfile->surname}}" name="surname" id="surname" placeholder="surname">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm">
                                                        <div class="form-group">
                                                            <div class="col-xs-6 text-center">
                                                                <label for="specialization"><h4>Spec.</h4></label>
                                                                <input type="specialization" readonly class="form-control text-center" value="{{$doctorProfile->doctorSpecialization->name}}" name="specialization" id="specialization" placeholder="specialization">
                                                            </div>
                                                        </div>
                                                    </div>
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




