@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Appointment Details</div>
                    <div class="card-body">
                        <div>
                            <label for="validationServer01">Appointment Date and Time</label>
                            <input readonly type="text" class="form-control" value="{{$appointment->appointment_date.' at: '.$appointment->appointment_time}}" required>

                            <label for="validationServer01">Patient Name</label>
                            <input readonly type="text" class="form-control" value="{{$patientProfile->name}}" required>

                            <label for="validationServer01">Patient Surname</label>
                            <input readonly type="text" class="form-control" value="{{$patientProfile->surname}}" required>

                            <label for="validationServer01">Patient Age</label>
                            <input readonly type="text" class="form-control" value="{{$patientProfile->getAge()}}" required>

                            <label for="exampleFormControlTextarea1">Patient disease symptoms</label>
                            <textarea readonly class="form-control" id="exampleFormControlTextarea1" rows="3">{{$appointment->symptom}}</textarea>

                            <label for="validationServer01">Appointment created:</label>
                            <input readonly type="text" class="form-control" value="{{$appointment->created_at->diffForHumans()}}" required>
                        </div>
                        @if(!$appointment->is_closed && Auth::user()->hasRole('ROLE_DOCTOR'))
                            <div class="text-center mt-2">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add Prescription</button>
                            </div>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                        <div class="form-group">
                            <label for="medicines" class="col-form-label">Medicines:</label>

                            <select id="medicines" class="form-control m-bot15" name="medicines[]" multiple="multiple">
                                @if ($medicines->count())
                                    @foreach($medicines ?? '' as $medicine)
                                        <option value="{{$medicine->id}}">{{$medicine->name}}</option>
                                    @endforeach
                                @endif
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="description" class="col-form-label">Description:</label>
                            <textarea class="form-control" id="description" name="description" required></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Finish Prescription</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection