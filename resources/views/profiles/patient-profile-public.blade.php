@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="container bootstrap snippet">
                        <div class="row">
                            <div class="m-2 ml-3">
                                <h1 class="text-primary">{{$patientProfile->user->name}}</h1>
                            </div>
                        </div>
                        <div class="badge-success">
                            <h5 class="text-center">Patient Profile Details</h5>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4"><!--left col-->
                                <div class="text-center">
                                    <img src="{{$patientProfile->profileImage()}}" class="rounded w-100 img-thumbnail float-left" alt="">
                                    <h6>Actual photo of patient</h6>
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
                                                <input type="text" readonly class="form-control" value="{{$patientProfile->name.' '.$patientProfile->surname}}" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any.">
                                            </div>
                                        </div>

                                        <div class="form-group form-inline">
                                            <div class="col-xs-2">
                                                <label for="age" class="text-left"><h4>Age</h4></label>
                                                <input type="text" readonly class="form-control" value="{{$patientProfile->getAge()}}" name="age" id="age" placeholder="age" title="enter your age if any.">
                                            </div>

                                            <div class="col-xs-1 ml-xl-auto">
                                                <label for="pesel"><h4>Birth Date</h4></label>
                                                <input type="text" readonly class="form-control" value="{{$patientProfile->birthDate}}" name="specialization" id="specialization" placeholder="specialization" title="enter your specialization if any.">
                                            </div>

                                            <div class="col-xs-2 pt-1">
                                                <label for="phone" class="text-left"><h4>Phone</h4></label>
                                                <input type="text" readonly class="form-control" value="{{$patientProfile->phone}}" name="age" id="age" placeholder="age" title="enter your age if any.">
                                            </div>

                                            <div class="col-xs-3 ml-xl-auto pt-1">
                                                <label for="gender"><h4>Gender</h4></label>
                                                @switch($patientProfile->gender)
                                                    @case(1)
                                                    <input type="text" readonly class="form-control" value="Male" name="gender" id="gender" placeholder="gender">
                                                    @break
                                                    @case(0)
                                                    <input type="text" readonly class="form-control" value="Female" name="gender" id="gender" placeholder="gender">
                                                    @break
                                                    @case(2)
                                                    <input type="text" readonly class="form-control" value="Other" name="gender" id="gender" placeholder="gender">
                                                    @break
                                                @endswitch
                                            </div>
                                        </div>

                                        <div class="form-group justify-content-center">
                                            <div class="col-xs-6">
                                                <label for="pesel"><h4>Pesel</h4></label>
                                                <input type="number" readonly class="form-control" value="{{$patientProfile->pesel}}" name="email" id="pesel" placeholder="pesel">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="email"><h4>Email</h4></label>
                                                <input type="email" readonly class="form-control" value="{{$patientProfile->user->email}}" name="email" id="email" placeholder="you@email.com" title="enter your email.">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="mobile"><h4>Street</h4></label>
                                                <input type="text" readonly class="form-control" value="{{$patientProfile->street}}" name="mobile" id="mobile" placeholder="no street to display" title="enter your mobile number if any.">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="email"><h4>Location</h4></label>
                                                <input type="email" readonly class="form-control" value="{{$patientProfile->locality}}" id="location" placeholder="somewhere" title="enter a location">
                                            </div>
                                        </div>
                                    </div><!--/tab-pane-->
                                </div><!--/tab-pane-->
                            </div><!--/tab-content-->
                        </div><!--/col-9-->
                        <hr>
                    </div><!--/row-->
                </div>
            </div>
        </div>
    </div>
@endsection