<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//MainPage
Route::get('/home', 'HomeController@index')->name('home');

//LoggedPatientProfile
Route::get('/home/profile/patient', 'PatientController@showProfile')->name('patient-profile');

//PatientProfiles List
Route::get('/home/patients', 'PatientController@showPatients')->name('patient-list');

//PatientProfile Public Show
Route::get('/home/patients/{patientProfile}', 'PatientController@showPatient')->name('patient-profile-public');

//PatientProfile Edit View
Route::get('/home/profile/patient/{patientProfile}/edit', 'PatientController@editPatient')->name('patient-profile-edit');

//PatientProfile Update
Route::patch('/home/profile/patient/{patientProfile}', 'PatientController@updatePatient')->name('patient-profile-update');

//Appointment Check Date
Route::get('/home/doctors/{doctorId}/date', 'AppointmentController@selectDate')->name('appointment');

//DoctorProfile GetDayOfWeekPlan
Route::get('/home/doctors/{doctorId}/date/plan', 'DoctorController@showPlan')->name('doctor-profile-plan');

//Appointment Form
Route::get('/home/doctors/{doctorId}/appointment', 'AppointmentController@formAppointment')->name('appointment-form');

//Appointment Create
Route::post('/home/doctors/{doctorId}/appointment/create', 'AppointmentController@createAppointment')->name('appointment-create');

//Patient Open Appointments
Route::get('/home/profile/patient/appointments', 'PatientController@showPatientOpenedAppointments')->name('patient-appointments-opened');

Route::get('/home/profile/patient/appointments/{appointment_id}', 'AppointmentController@showAppointmentDetail')->name('patient-appointments');

//Patient Closed Appointments
Route::get('/home/profile/patient/appointments-closed', 'PatientController@showPatientClosedAppointments')->name('patient-appointments-closed');



//LoggedDoctorProfile
Route::get('/home/profile/doctor', 'DoctorController@showProfile')->name('doctor-profile');

//DoctorProfiles List
Route::get('/home/doctors', 'DoctorController@showDoctors')->name('doctor-list');

//DoctorProfiles List
Route::get('/home/doctors/specialization/{specialization_id}', 'DoctorController@showDoctorsSpecialization')->name('doctor-list-specialization');

//DoctorProfile Public Show
Route::get('/home/doctors/{doctorProfile}', 'DoctorController@showDoctor')->name('doctor-profile-public');

//DoctorProfile Edit View
Route::get('/home/profile/doctor/{doctorId}/edit', 'DoctorController@editDoctor')->name('doctor-profile-edit');

//Doctor Open Appointments
Route::get('/home/profile/doctor/appointments', 'DoctorController@showDoctorClosedAppointments')->name('doctor-appointments');

//DoctorProfile Update
Route::patch('/home/profile/doctor/{doctorId}', 'DoctorController@updateDoctor')->name('doctor-profile-update');

Route::get('/home/profile/doctor/appointments/{appointment_id}', 'AppointmentController@showAppointmentDetail')->name('appointment-detail');

//Prescription
Route::post('/home/profile/doctor/appointments/{appointmentId}/prescription', 'PrescriptionController@createPrescription')->name('prescription-create');





//Route::get('/', 'SampleController@index');

//Route::get('/', 'SampleController@mainPage');

//Route::post('/doctor-register', 'RegisterDoctorController@create');

Auth::routes();

