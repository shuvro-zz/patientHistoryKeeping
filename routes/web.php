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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('patient', 'PatientController@patient');

Route::get('diagnosis', 'PatientController@diagnosis');

Route::get('insertPatientDetails', 'PatientController@insertPatientDetails');

Route::get('insertPatient', 'PatientController@insertPatient');

Route::get('editPatientForm', 'PatientController@editPatientForm');

Route::post('editPatient', 'PatientController@editPatient');

Route::get('deleteForm', 'PatientController@deleteForm');

Route::post('deletePatient', 'PatientController@deletePatient');

Route::get('patientAppointment', 'AppointmentController@patientAppointment');

Route::get('insertFollowups', 'AppointmentController@insertFollowups');

Route::get('editPatientAppointments', 'AppointmentController@editPatientAppointments');

Route::get('deleteAppointments', 'AppointmentController@deleteAppointments');

Route::post('insertPatientFollowups', 'AppointmentController@insertPatientFollowups');

Route::post('editAppointments', 'AppointmentController@editAppointments');

Route::post('deletePatientAppointments', 'AppointmentController@deletePatientAppointments');

Route::get('searchPatient', 'PatientController@searchPatient');

Route::post('editAppointmentForm', 'AppointmentController@editAppointmentForm');

Route::post('deleteAppointmentForm', 'AppointmentController@deleteAppointmentForm');

Route::resource('insertDoctors', 'DoctorsController');

Route::resource('insertDoctorDetails', 'DoctorsController');

Route::resource('insertHospitals', 'HospitalsController');

Route::resource('insertHospitalDetails', 'HospitalsController');

Route::resource('diagnosis', 'DiagnosisController');

Route::resource('insertDiagnosisDetails', 'DiagnosisController');

Route::post('fanda','AppointmentController@fanda');

Route::post('fillFanda','AppointmentController@fillFanda');

Route::post('showStatus','AppointmentController@showStatus');