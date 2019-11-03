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
Route::get('/home/patients/{patientId}', 'PatientController@showPatient')->name('patient-profile-public');

//PatientProfile Edit View
Route::get('/home/profile/patient/{patientId}/edit', 'PatientController@editPatient')->name('patient-profile-edit');

//PatientProfile Update
Route::patch('/home/profile/patient/{patientId}', 'PatientController@updatePatient')->name('patient-profile-update');


//LoggedDoctorProfile
Route::get('/home/profile/doctor', 'DoctorController@showProfile')->name('doctor-profile');

//DoctorProfiles List
Route::get('/home/doctors', 'DoctorController@showDoctors')->name('doctor-list');

//DoctorProfile Public Show
Route::get('/home/doctors/{doctorId}', 'DoctorController@showDoctor')->name('doctor-profile-public');

//DoctorProfile Edit View
Route::get('/home/profile/doctor/{doctorId}/edit', 'DoctorController@editDoctor')->name('doctor-profile-edit');

//DoctorProfile Update
Route::patch('/home/profile/doctor/{doctorId}', 'DoctorController@updateDoctor')->name('doctor-profile-update');


//Route::get('/', 'SampleController@index');

//Route::get('/', 'SampleController@mainPage');

//Route::post('/doctor-register', 'RegisterDoctorController@create');

Auth::routes();

