@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('message'))
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ Session::get('message') }}
        </div>
    @endif
{{--    @if (session('status'))--}}
{{--        <div class="alert alert-warning" role="alert">--}}
{{--            {{ session('status') }}--}}
{{--        </div>--}}
{{--    @endif--}}
        @if(Auth::user()->hasRole('ROLE_PATIENT'))
            <div class="card">
                <div class="card-header text-center text-info"><h1>Our Specializations</h1></div>
                <div class="row justify-content-center pb-3 pt-3">
                    <div class="col-3">
                        <a href="/home/doctors/specialization/1">
                            <img src="/images/profile_placeholder.jpg" alt="No Image" class="img-fluid">
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="/home/doctors/specialization/2">
                            <img src="/images/profile_placeholder.jpg" alt="No Image" class="img-fluid">
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="/home/doctors/specialization/3">
                            <img src="/images/profile_placeholder.jpg" alt="No Image" class="img-fluid">
                        </a>
                    </div>
                </div>
                <div class="row justify-content-center pb-3">
                    <div class="col-3">
                        <a href="/home/doctors/specialization/4">
                            <img src="/images/profile_placeholder.jpg" alt="No Image" class="img-fluid">
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="/home/doctors/specialization/5">
                            <img src="/images/profile_placeholder.jpg" alt="No Image" class="img-fluid">
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="/home/doctors/specialization/6">
                            <img src="/images/profile_placeholder.jpg" alt="No Image" class="img-fluid">
                        </a>
                    </div>
                </div>

                <div class="row justify-content-center pb-3">
                    <div class="col-3">
                        <a href="/home/doctors/specialization/7">
                            <img src="/images/profile_placeholder.jpg" alt="No Image" class="img-fluid">
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="/home/doctors/specialization/8">
                            <img src="/images/profile_placeholder.jpg" alt="No Image" class="img-fluid">
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="/home/doctors/specialization/9">
                            <img src="/images/profile_placeholder.jpg" alt="No Image" class="img-fluid">
                        </a>
                    </div>
                </div>

                <div class="row justify-content-center m-2 pb-3">
                    <div class="justify-content-center">
                        <a class="btn btn-success" href="/home/doctors">Show all specializations</a>
                    </div>
                </div>
            </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                            You are logged in as patient !
                            @elseif(Auth::user()->hasRole('ROLE_DOCTOR'))
                            You are logged in as doctor !
                        @elseif(Auth::user()->hasRole('ROLE_ADMIN'))
                            You are logged in as an admin !
                            Hi Boss <3
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
