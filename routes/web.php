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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('accident', 'AccidentController');
Route::resource('officer', 'OfficerConcernedController');
Route::resource('progress', 'ProgressController');
Route::resource('section', 'SectionController');
Route::resource('death', 'DeathController');
Route::resource('injury', 'InjuryController');
Route::resource('risk_identification', 'RiskIdentificationController');
Route::resource('risk_control', 'RiskControlController');
Route::post('report', 'ReportController@generate')->name('report.generate');
Route::get('/report/show', 'ReportController@show')->name('report.show');
Route::get('report', 'ReportController@index')->name('report.index');

Route::get('/admin/users', 'AdminController@manage_users')->name('manage.users');
Route::get('/admin/users/{id}', 'AdminController@manage_user')->name('manage.user');
Route::post('/admin/users/{id}', 'AdminController@assign_roles')->name('assign.role');



// INSPECTION routes
Route::get('/inspection/form', 'InspectionController@form')->name('inspection.form');
Route::get('/inspection/details', 'InspectionController@details')->name('inspection.details');
Route::get('/inspection/add_details', 'InspectionController@add_details')->name('inspection.add');

