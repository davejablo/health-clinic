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
                        @if($appointment->is_closed)
                            <div class="text-center mt-2">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Prescription Details</button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Prescription details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-primary" role="alert">
                        @if(Auth::user()->hasRole('ROLE_PATIENT'))
                            Prescription created by: <a href="{{url('/home/doctors/'.$doctorProfile->id)}}" class="alert-link">{{$doctorProfile->name.' '.$doctorProfile->surname}}</a> at: {{ $prescription->created_at}}
                        @elseif(Auth::user()->hasRole('ROLE_DOCTOR'))
                            Prescription created by: <a href="{{url('/home/profile/doctor')}}" class="alert-link">{{$doctorProfile->name.' '.$doctorProfile->surname}}</a> at: {{ $prescription->created_at}}
                        @endif
                    </div>
                    <div class="alert alert-danger" role="alert">
                        <div class="form-group">
                            <label for="disease" class="col-form-label">Diagnose:</label>
                            <input readonly type="text" class="form-control" value="{{$disease->name}}">
                            <label for="description" class="col-form-label">Description:</label>
                            <textarea readonly class="form-control" id="exampleFormControlTextarea1" rows="3">{{$disease->description}}</textarea>
                        </div>
                    </div>

                    <div class="alert alert-success" role="alert">
                        Prescripted medicines
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">N.</th>
                                <th scope="col">Status</th>
                                <th scope="col">Name</th>
                                <th scope="col">International Name</th>
                                <th scope="col">Form</th>
                                <th scope="col">Dose</th>
                                <th scope="col">P.Quantity</th>
                                <th scope="col">Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($medicines as $medicine)
                                <tr>
                                    <th scope="row">{{$medicine->id}}</th>
                                    <td>{{$medicine->status}}</td>
                                    <td>{{$medicine->name}}</td>
                                    <td>{{$medicine->name_international}}</td>
                                    <td>{{$medicine->form}}</td>
                                    <td>{{$medicine->dose}}</td>
                                    <td>{{$medicine->package_quantity}}</td>
                                    <td>{{$medicine->price}}</td>
                                    <td>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <span class="float-right m-1">
                                Total price: {{$totalPrice}}
                        </span>
                        </table>

                    </div>

                    <div class="alert alert-warning" role="alert">
                        <div class="form-group">
                            <label for="description" class="col-form-label">Doctor Advices:</label>
                            <textarea class="form-control" id="description" name="description" readonly>{{$prescription->description}}</textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection