@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="container bootstrap snippet">
                        <div class="row">
                            <div class="m-2 ml-3">
                                <h1 class="text-primary">{{Auth::user()->name}}</h1>
                            </div>
                        </div>
                        <div class="badge-success">
                            <h5 class="text-center">Patient Profile Details</h5>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-sm-4"><!--left col-->
                                <div class="text-center">
                                    <img src="{{Auth::user()->patientProfile->profileImage()}}" class="rounded w-100 img-thumbnail float-left" alt="">
                                    <h6>Edit profile to upload different photo ...</h6>
                                </div>
                                <br>

                                <ul class="list-group">
                                    <li class="list-group-item text-center text-secondary">Appointment activity <i class="fa fa-dashboard fa-1x"></i></li>
                                    <li class="list-group-item text-center text-danger"><span class="pull-left"><strong>Closed</strong></span> 125</li>
                                    <li class="list-group-item text-center text-primary"><span class="pull-left"><strong>Prescriptions</strong></span> 13</li>
                                </ul>

                            </div><!--/col-3-->
                            <div class="col-md-8">

                                <div class="tab-content">
                                    <div class="tab-pane active" id="home">
                                        <hr>
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="first_name"><h4>Full name</h4></label>
                                                <input type="text" readonly class="form-control" value="{{Auth::user()->patientProfile->name.' '.Auth::user()->patientProfile->surname}}" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any.">
                                            </div>
                                        </div>

                                        <div class="form-group form-inline">
                                            <div class="col-xs-2">
                                                <label for="age" class="text-left"><h4>Age</h4></label>
                                                <input type="text" readonly class="form-control" value="{{Auth::user()->patientProfile->getAge()}}" name="age" id="age" placeholder="age" title="enter your age if any.">
                                            </div>

                                            <div class="col-xs-1 ml-xl-auto">
                                                <label for="specialization"><h4>Birth Date</h4></label>
                                                <input type="text" readonly class="form-control" value="{{Auth::user()->patientProfile->birthDate}}" name="specialization" id="specialization" placeholder="specialization" title="enter your specialization if any.">
                                            </div>

                                            <div class="col-xs-2 pt-1">
                                                <label for="phone" class="text-left"><h4>Phone</h4></label>
                                                <input type="text" readonly class="form-control" value="{{Auth::user()->patientProfile->phone}}" name="age" id="age" placeholder="age" title="enter your age if any.">
                                            </div>

                                            <div class="col-xs-3 ml-xl-auto pt-1">
                                                <label for="gender"><h4>Gender</h4></label>
                                                @switch(Auth::user()->patientProfile->gender)
                                                    @case(1)
                                                    <input type="text" readonly class="form-control" value="Male" name="gender" id="gender" placeholder="gender" title="enter your gender if any.">
                                                    @break
                                                    @case(0)
                                                    <input type="text" readonly class="form-control" value="Female" name="gender" id="gender" placeholder="gender" title="enter your gender if any.">
                                                    @break
                                                    @case(2)
                                                    <input type="text" readonly class="form-control" value="Other" name="gender" id="gender" placeholder="gender" title="enter your gender if any.">
                                                    @break
                                                @endswitch
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="pesel"><h4>Pesel</h4></label>
                                                <input type="text" readonly class="form-control" value="{{Auth::user()->patientProfile->pesel}}" name="email" id="email" placeholder="pesel">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="email"><h4>Email</h4></label>
                                                <input type="email" readonly class="form-control" value="{{Auth::user()->email}}" name="email" id="email" placeholder="you@email.com">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="mobile"><h4>Street</h4></label>
                                                <input type="text" readonly class="form-control" value="{{Auth::user()->patientProfile->street}}" name="mobile" id="mobile" placeholder="no street to display">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="email"><h4>Location</h4></label>
                                                <input type="email" readonly class="form-control" value="{{Auth::user()->patientProfile->locality}}" id="location" placeholder="somewhere">
                                            </div>
                                        </div>
                                    </div><!--/tab-pane-->
                                </div><!--/tab-pane-->
                            </div><!--/tab-content-->

                        </div><!--/col-9-->
                        <hr>
                    </div><!--/row-->
                    <div class="row justify-content-center m-2">
                        <div class="justify-content-center">
                            <a class="btn btn-outline-success m-2" href="/home/profile/patient/{{Auth::user()->patientProfile->id}}/edit">Edit Profile</a>
                            <a class="btn btn-outline-danger m-2" href="{{route('patient-appointments-closed')}}">Show closed appointments</a>
                            <a class="btn btn-outline-primary" href="{{route('patient-appointments-opened')}}">Show opened appointments</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
