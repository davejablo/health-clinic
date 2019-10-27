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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/profile/patient', 'PatientController@showProfile')->name('patient-profile');
Route::get('/home/profile/doctor', 'DoctorController@showProfile')->name('doctor-profile');
Route::get('/home/doctors', 'DoctorController@showDoctors')->name('doctor-list');

//Route::get('/', 'SampleController@index');

//Route::get('/', 'SampleController@mainPage');

//Route::post('/doctor-register', 'RegisterDoctorController@create');

Auth::routes();

