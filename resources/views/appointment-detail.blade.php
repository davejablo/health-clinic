@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center text-info"><h2>Appointment details</h2></div>
                    <div class="card-body">
                        <div>
                            <div class="alert alert-primary" role="alert">
                                @if(Auth::user()->hasRole('ROLE_PATIENT'))
                                Assigned doctor: <a href="{{url('/home/doctors/'.$appointment->doctor_profile_id)}}" class="alert-link">Show Profile</a>
                                    @elseif(Auth::user()->hasRole('ROLE_DOCTOR'))
                                    Assigned patient: <a href="{{url('/home/patients/'.$appointment->patient_profile_id)}}" class="alert-link">Show Profile</a>
                                    @endif
                            </div>
                            <div class="alert alert-primary" role="alert">
                                <label for="validationServer01">Appointment Date and Time</label>
                                <input readonly type="text" class="form-control" value="{{$appointment->appointment_date.' at: '.$appointment->appointment_time}}" required>
                            </div>

                            <div class="alert alert-success" role="alert">
                                <label for="validationServer01">Patient Name</label>
                                <input readonly type="text" class="form-control" value="{{$patientProfile->name}}" required>

                                <label for="validationServer01">Patient Surname</label>
                                <input readonly type="text" class="form-control" value="{{$patientProfile->surname}}" required>

                                <label for="validationServer01">Patient Age</label>
                                <input readonly type="text" class="form-control" value="{{$patientProfile->getAge()}}" required>
                            </div>

                            <div class="alert alert-danger" role="alert">
                                <label for="exampleFormControlTextarea1">Patient disease symptoms</label>
                                <textarea readonly class="form-control" id="exampleFormControlTextarea1" rows="3">{{$appointment->symptom}}</textarea>
                            </div>

                            <div class="alert alert-warning" role="alert">
                                <label for="validationServer01">Appointment created:</label>
                                <input readonly type="text" class="form-control" value="{{$appointment->created_at->diffForHumans()}}" required>
                            </div>
                        </div>
                        @if(!$appointment->is_closed && Auth::user()->hasRole('ROLE_DOCTOR'))
                            <div class="text-center mt-2">
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add Prescription</button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(Auth::user()->hasRole('ROLE_DOCTOR'))
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create a prescription</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/home/profile/doctor/appointments/{appointmentId}/prescription" enctype="" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="alert alert-success" role="alert">
                                    <input type="hidden" name="appointment_id" id="appointment_id" value="{{$appointment->id}}">
                                    <label for="disease" class="col-form-label">Diagnose:</label>
                                    <select class="form-control m-bot15" id="disease" name="disease">
                                        @if ($diseases->count())
                                            @foreach($diseases ?? '' as $disease)
                                                <option value="{{$disease->id}}">{{$disease->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="alert alert-primary" role="alert">
                                    <label for="medicines" class="col-form-label">Medicines:</label>
                                    <select id="medicines" class="form-control m-bot15" name="medicines[]" multiple="multiple">
                                        @if ($medicines->count())
                                            @foreach($medicines ?? '' as $medicine)
                                                <option value="{{$medicine->id}}">{{$medicine->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="alert alert-dark" role="alert">
                                    <label for="description" class="col-form-label">Description:</label>
                                    <textarea class="form-control" id="description" name="description" required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Finish Prescription</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif
@endsection