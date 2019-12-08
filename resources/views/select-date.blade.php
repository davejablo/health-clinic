@extends('layouts.app')

@section('content')

    <div class="container">
        @if(Session::has('message'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{ Session::get('message') }}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Appointment</div>

                    <div class="card-body justify-content-center">
                        @if($doctorPlans->count())
                        @foreach($doctorPlans as $doctorPlan)
                            <h2>{{$weekMap[$doctorPlan->day_of_week] }} from {{\Carbon\Carbon::createFromTimeString($doctorPlan->from_hour)->format('H:i')}} to {{\Carbon\Carbon::createFromTimeString($doctorPlan->to_hour)->format('H:i')}}</h2>
                        @endforeach
                        @else
                            <div class="alert alert-warning" role="alert">
                                <h3>Doctor has no terms scheduled</h3>
                            </div>
                            @endif
                        <form action="/home/doctors/{{$doctorId ?? ''}}/date/plan" method="GET">
                            @csrf
                        <div class="form-group text-center">
                            <input class="form-control" type="hidden" id="doctorProfile_id" name="doctorProfile_id" value={{$doctorId ?? ''}}>

                                <label for="selectedDate" class="col-md-4 col-form-label text-md-right">{{ __('Check term availability') }}</label>
                                <div class="col-md-6 m-auto">
                                    <input id="datepicker" type="date" class="form-control @error('selectedDate') is-invalid @enderror" name="selectedDate" value="" autocomplete="Check Date">
                                    @error('selectedDate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                        </div>
                            <div class="form-group row m-auto">
                                <div class="col-md-6 offset-md-4">
                                    <button class="btn btn-primary" type="submit">Checks terms</button>
                                </div>
                            </div>
                    </form>
                        <div class="container">
{{--                            @yield('terms-content')--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection