@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                        <form action="/home/profile/doctor/{{$doctorProfile->id}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="container bootstrap snippet">
                                <div class="row">
                                    <div class="m-2 ml-3">
                                        <h1 class="text-primary">{{Auth::user()->name}}</h1>
                                    </div>
                                </div>
                                <div class="badge-success">
                                    <h5 class="text-center">Edit Doctor Profile</h5>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4"><!--left col-->

                                        <div class="text-center">
                                            <img id="output" src="{{Auth::user()->doctorProfile->profileImage()}}" class="rounded w-100 img-thumbnail float-left" alt="">
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input  type="file" class="form-control-file pt-2 @error('image') is-invalid @enderror" id="image" name="image" onchange="loadFile(event)">
                                                @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <br>

                                        <ul class="list-group">
                                            <li class="list-group-item text-center text-secondary">Appointment activity <i class="fa fa-dashboard fa-1x"></i></li>
                                            <li class="list-group-item text-center text-danger"><span class="pull-left"><strong>Closed</strong></span> 125</li>
                                            <li class="list-group-item text-center text-primary"><span class="pull-left"><strong>Open</strong></span> 13</li>
                                            <li class="list-group-item text-center text-success"><span class="pull-left"><strong>Total</strong></span> 37</li>
                                        </ul>

                                    </div><!--/col-3-->
                                    <div class="col-md-8">

                                        <div class="tab-content">
                                            <div class="tab-pane active" id="home">
                                                <hr>

                                                <div class="form-group form-inline">
                                                    <div class="col-xs-2">
                                                        <label for="name" class="text-left"><h4>First Name</h4></label>
                                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name') ?? $doctorProfile->name}}" autocomplete="name" autofocus>
                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-xs-3 ml-xl-auto">
                                                        <label for="surname"><h4>Last Name</h4></label>
                                                        <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{old('surname') ?? $doctorProfile->surname}}" autocomplete="surname">
                                                        @error('surname')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group form-inline">
                                                    <div class="col-xs-2">
                                                        <label for="birthDate" class="text-left"><h4>Birth Date</h4></label>
                                                        <input id="datepicker" type="date" class="form-control @error('birthDate') is-invalid @enderror" name="birthDate" value="{{old('birthDate') ?? $doctorProfile->birthDate}}" autocomplete="birthDate">
                                                        @error('birthDate')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-xs-3 ml-xl-auto">
                                                        <div class="col-xs-6">
                                                            <label for="phone"><h4>Phone</h4></label>
                                                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{old('phone') ?? $doctorProfile->phone}}" autocomplete="phone">
                                                            @error('phone')
                                                            <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-xs-6">
                                                        <label for="email"><h4>Email</h4></label>
                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email') ?? $doctorProfile->user->email}}" autocomplete="email">
                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-xs-6">
                                                        <label for="street"><h4>Street</h4></label>
                                                        <input id="street" type="text" class="form-control @error('street') is-invalid @enderror" name="street" value="{{old('street') ?? $doctorProfile->street}}" required autocomplete="street" placeholder="enter your street">
                                                        @error('street')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-xs-6">
                                                        <label for="email"><h4>Location</h4></label>
                                                        <input id="locality" type="text" class="form-control @error('locality') is-invalid @enderror" name="locality" value="{{old('locality') ?? $doctorProfile->locality}}" autocomplete="locality">
                                                        @error('locality')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div><!--/tab-pane-->
                                        </div><!--/tab-pane-->
                                    </div><!--/tab-content-->

                                </div><!--/col-9-->
                                <hr>
                            </div><!--/row-->



{{--                            <div class="form-group row">--}}
{{--                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name') ?? $doctorProfile->name}}" autocomplete="name" autofocus>--}}
{{--                                    @error('name')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group row">--}}
{{--                                <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{old('surname') ?? $doctorProfile->surname}}" autocomplete="surname">--}}
{{--                                    @error('surname')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group row">--}}
{{--                                <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <select class="form-control m-bot15" name="gender">--}}
{{--                                        <option value="1">Male</option>--}}
{{--                                        <option value="0">Female</option>--}}
{{--                                        <option value="2">Other</option>--}}
{{--                                    </select>--}}
{{--                                    @error('gender')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group row">--}}
{{--                                <label for="birthDate" class="col-md-4 col-form-label text-md-right">{{ __('Birth Date') }}</label>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <input id="datepicker" type="date" class="form-control @error('birthDate') is-invalid @enderror" name="birthDate" value="{{old('birthDate') ?? $doctorProfile->birthDate}}" autocomplete="birthDate">--}}
{{--                                    @error('birthDate')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group row">--}}
{{--                                <label for="specialization" class="col-md-4 col-form-label text-md-right">{{ __('Specialization') }}</label>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <select class="form-control m-bot15" name="specialization_id">--}}
{{--                                        @if ($specializations->count())--}}
{{--                                            @foreach($specializations as $specialization)--}}
{{--                                                <option value="{{$specialization->id}}">{{$specialization->name}}</option>--}}
{{--                                            @endforeach--}}
{{--                                        @endif--}}
{{--                                    </select>--}}
{{--                                    <input id="specialization" type="text" class="form-control @error('specialization') is-invalid @enderror" name="specialization" value="{{ old('specialization') ?? $doctorProfile->specialization}}" required autocomplete="specialization">--}}
{{--                                    @error('specialization')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group row">--}}
{{--                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{old('phone') ?? $doctorProfile->phone}}" autocomplete="phone">--}}
{{--                                    @error('phone')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group row">--}}
{{--                                <label for="locality" class="col-md-4 col-form-label text-md-right">{{ __('Locality') }}</label>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <input id="locality" type="text" class="form-control @error('locality') is-invalid @enderror" name="locality" value="{{old('locality') ?? $doctorProfile->locality}}" autocomplete="locality">--}}
{{--                                    @error('locality')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group row">--}}
{{--                                <label for="street" class="col-md-4 col-form-label text-md-right">{{ __('Street') }}</label>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <input id="street" type="text" class="form-control @error('street') is-invalid @enderror" name="street" value="{{old('street') ?? $doctorProfile->street}}" required autocomplete="street">--}}
{{--                                    @error('street')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group row">--}}
{{--                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email') ?? $doctorProfile->user->email}}" autocomplete="email">--}}
{{--                                    @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            <div class="row justify-content-center m-2">
                                <div class="justify-content-center">
                                    <button class="btn btn-success" type="submit">Save Profile</button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection
