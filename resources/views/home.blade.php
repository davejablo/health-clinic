@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        @if(Auth::user()->hasRole('ROLE_PATIENT'))
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
