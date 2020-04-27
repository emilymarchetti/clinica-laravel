<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Paciente
Route::get('/paciente', 'PacienteController@index')->name('paciente.index');
Route::get('/paciente/create', 'PacienteController@create')->name('paciente.create');
Route::post('paciente', 'PacienteController@store')->name('paciente.store');
Route::get('/paciente/{id}', 'PacienteController@show')->name('paciente.show');
Route::get('/paciente/{id}/edit', 'PacienteController@edit')->name('paciente.edit');
Route::patch('/paciente/{id}', 'PacienteController@update')->name('paciente.update');
Route::delete('/paciente/{id}', 'PacienteController@destroy')->name('paciente.destroy');

// Médico
Route::get('/medico', 'MedicoController@index')->name('medico.index');
Route::get('/medico/create', 'MedicoController@create')->name('medico.create');
Route::post('medico', 'MedicoController@store')->name('medico.store');
Route::get('/medico/{id}', 'MedicoController@show')->name('medico.show');
Route::get('/medico/{id}/edit', 'MedicoController@edit')->name('medico.edit');
Route::patch('/medico/{id}', 'MedicoController@update')->name('medico.update');
Route::delete('/medico/{id}', 'MedicoController@destroy')->name('medico.destroy');

// Especialidade
Route::get('/especialidade', 'EspecialidadeController@index')->name('especialidade.index');
Route::get('/especialidade/create', 'EspecialidadeController@create')->name('especialidade.create');
Route::post('especialidade', 'EspecialidadeController@store')->name('especialidade.store');
Route::get('/especialidade/{id}', 'EspecialidadeController@show')->name('especialidade.show');
Route::get('/especialidade/{id}/edit', 'EspecialidadeController@edit')->name('especialidade.edit');
Route::patch('/especialidade/{id}', 'EspecialidadeController@update')->name('especialidade.update');
Route::delete('/especialidade/{id}', 'EspecialidadeController@destroy')->name('especialidade.destroy');

// Consulta
Route::get('/consulta', 'ConsultaController@index')->name('consulta.index');
Route::get('/consulta/create', 'ConsultaController@create')->name('consulta.create');
Route::post('consulta', 'ConsultaController@store')->name('consulta.store');
Route::get('/consulta/{id}', 'ConsultaController@show')->name('consulta.show');
Route::get('/consulta/{id}/edit', 'ConsultaController@edit')->name('consulta.edit');
Route::patch('/consulta/{id}', 'ConsultaController@update')->name('consulta.update');
Route::delete('/consulta/{id}', 'ConsultaController@destroy')->name('consulta.destroy');

// Relatorios
Route::get('/consultaMedico', 'ConsultaController@consultaMedico')->name('consulta.consultas_medico');
Route::get('pdfConsultaMedico', 'ConsultaController@consultaMedico')->name('pdfConsultaMedico');

Route::get('/consultaPaciente', 'ConsultaController@consultaPaciente')->name('consulta.consultas_paciente');
Route::get('pdfConsultaPaciente', 'ConsultaController@consultaPaciente')->name('pdfConsultaPaciente');

Route::get('/medicoEspecialidade', 'MedicoController@medicoEspecialidade')->name('medico.medicos_especialidade');
Route::get('pdfMedicoEspecialidade', 'MedicoController@medicoEspecialidade')->name('pdfMedicoEspecialidade');
