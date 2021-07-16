<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/
/*Route::get('/', function () {
|
    return view('atendimento.agenda_hoje');
});*/


//View Composer
View::composer(['*'], function($view){

$user = Auth::user();
$view->with('user',$user);

});

// Welcome
Route::get('/', function(){

	return view('welcome');
});


//Users
Route::resource('users', 'UserController');

//Patients
Route::resource('patients', 'PatientController');
Route::get('patient-appointment/{patient}', 'PatientController@patient')->name('patient-appointment');

//Physicians
Route::resource('physicians', 'PhysicianController');
Route::get('advice/{id}/{phy_id}', 'AdviceController@getadvice')->name('get.advice');
Route::post('postadvice', 'AdviceController@postadvice')->name('post.advice');

//Route::post('advicess/{id}', 'PhysicianController@advicepost')->name('physician.advicespost');


//Appointments
Route::resource('appointments', 'AppointmentController');
Route::get('appointments/today/{today}', 'AppointmentController@today')->name('appointments.today');
//Route::get('appointments/{patient}', 'AppointmentController@patient')->name('appointments.patient');


// advices
Route::resource('advices', 'AdviceController');
Route::get('advice-details/{id}', 'AdviceController@details')->name('advice.details');

// reviews
Route::resource('reviews', 'ReviewController');
Route::get('review/{patient}', 'ReviewController@review')->name('review');

//Specialities
Route::resource('specialities', 'SpecialityController')->except('show');

//Relationships
Route::resource('relationships', 'RelationshipController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Chart
Route::get('charts', 'ChartController@charts');


//pdf
Route::get('patients-pdf', 'PdfController@patientsPdf')->name('patients.pdf');
Route::get('patientpdf', 'PdfController@advice')->name('advice.pdf');
Route::get('physician-today-pdf/{id}/{today}', 'PdfController@physicianTodayPdf')->name('physician.today.pdf');
Route::get('physician-all-pdf/{id}', 'PdfController@physicianAllPdf')->name('physician.all.pdf');
Route::get('physicians-general-pdf', 'PdfController@physiciansGeneralPdf')->name('physicians.general.pdf');
Route::get('all-physicians-diary-pdf', 'PdfController@allPhysiciansDiaryPdf')->name('physicians.diary.pdf');
Route::get('physicians-reports', 'PhysicianController@pdfIndex')->name('physicians.reports');

//Config

Route::get('config-index', 'ConfigController@index')->name('config.index');
Route::get('config-clinica', 'ConfigController@clinic')->name('config.clinic');
Route::get('editar-clinica/{cli}', 'ConfigController@editClinic')->name('edit.clinic');
Route::get('info-clinica/{cli}', 'ConfigController@clinicShow')->name('clinic.show');
Route::any('actualizar-clinica/{cli}', 'ConfigController@clinicUpdate')->name('clinic.update');
Route::post('store-clinica', 'ConfigController@store')->name('clinic.store');


//Excel
Route::get('users/excel/{id}', 'UserController@excel')->name('users.excel');


Route::get('excel-advices', 'AdviceController@export')->name('advices.excel');
Route::get('excel-appointments', 'AppointmentController@export')->name('appointments.excel');
Route::get('excel-patients', 'PatientController@export')->name('patients.excel');

//Dating a Patient
//Route::get('dating', 'AppointmentController@dating')->name('dating');
//Route::get('appointment/patient/{id}', 'AppointmentController@patient')->name('appointment.patient');






























/*
Route::get('pdf', 'PdfController@index')->name('pdf');
//===================    MÉDICO ROUTES ========================================

Route::post('/admin/medicos', 'Admin\MedicoController@store')->name('medico.store');
Route::get('/admin/medicos', 'Admin\MedicoController@create')->name('medico.create');

Route::get('admin/medicos/edit/{id}', 'Admin\MedicoController@edit')->name('medico.edit');

Route::any('/admin/medicos/{id}/update', 'Admin\MedicoController@update')->name('medico.update');
Route::any('/admin/medicos/{id}/destroy', 'Admin\MedicoController@destroy')->name('medico.destroy');
Route::get('/admin/medicos/{id}/show', 'Admin\MedicoController@show')->name('medico.show');


Route::get('/medicos', 'Admin\MedicoController@index')->name('medico.index');


//===================== USERS ROUTES ========================================================

Route::post('/admin/usuario/store', 'Admin\UserController@store')->name('usuario.store');
Route::get('/admin/usuario/create', 'Admin\UserController@create')->name('usuario.create');

Route::get('/admin/usuario/edit/{id}', 'Admin\UserController@edit')->name('usuario.edit');
Route::any('/admin/usuario/{id}/update', 'Admin\UserController@update')->name('usuario.update');
Route::any('/admin/usuario/{id}/destroy', 'Admin\UserController@destroy')->name('usuario.destroy');
Route::get('/admin/usuario/{id}/show', 'Admin\UserController@show')->name('usuario.show');
Route::get('/admin/usuario', 'Admin\UserController@index')->name('usuario.index');



//===================== Pacientes ROUTES ========================================================

Route::post('admin/paciente/store', 'Admin\pacienteController@store')->name('paciente.store');
Route::get('admin/paciente/create', 'Admin\pacienteController@create')->name('paciente.create');

Route::get('admin/paciente/edit/{id}', 'Admin\pacienteController@edit')->name('paciente.edit');
Route::any('admin/paciente/{id}/update', 'Admin\pacienteController@update')->name('paciente.update');
Route::any('admin/paciente/{id}/destroy', 'Admin\pacienteController@destroy')->name('paciente.destroy');
Route::get('admin/paciente/{id}/show', 'Admin\pacienteController@show')->name('paciente.show');
Route::get('admin/paciente', 'Admin\pacienteController@index')->name('paciente.index');

//Route::any('admin/paciente/{id}/excel', 'Admin\pacienteController@excel')->name('paciente.excel');
Route::any('admin/paciente/excel', 'Admin\pacienteController@excel')->name('paciente.excel');



//===================== MARCAÇÕES ROUTES ========================================================

Route::get('/agendamento/{id}', 'Admin\AgendamentosController@agendamento')->name('agendamento');
Route::post('/agendamento', 'Admin\AgendamentosController@salvaragendamento')->name('salvaragendamento');
Route::get('/teste', 'Admin\AgendamentosController@teste')->name('teste');
Route::get('/agendahoje', 'Admin\AgendamentosController@agendaHoje')->name('agendahoje');
Route::get('/agenda', 'Admin\AgendamentosController@agenda')->name('agenda');

Route::get('/agenda-medico/{nome}', 'Admin\AgendamentosController@agendaMedico')->name('agenda.medico');   */


