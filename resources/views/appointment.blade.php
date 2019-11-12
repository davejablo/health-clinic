@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Appointment</div>
                    <div class="card-body">
                        <form action="/home/doctors/{{$doctorId}}/appointment/create" method="post">
                            @csrf
                        <div class="form-group">
                            <input class="form-control" type="hidden" id="doctorProfile_id" name="doctorProfile_id" value={{$doctorId}}>
                            <input class="form-control" type="hidden" id="patientProfile_id" name="patientProfile_id" value={{Auth::user()->patientProfile->id}}>
                            <label for="symptom" type="text">Actual symptoms</label>
                            <textarea class="form-control" id="symptom" name="symptom" rows="3" required></textarea>
                        </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button class="btn btn-warning" type="submit">Sign In</button>
                                </div>
                            </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection