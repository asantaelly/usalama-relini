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
    return redirect()->route('login');
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


// ADMIN ROUTES
Route::get('/admin/users', 'AdminController@manage_users')->name('manage.users');
Route::get('/admin/users/{id}', 'AdminController@manage_user')->name('manage.user');
Route::post('/admin/users/{id}', 'AdminController@assign_roles')->name('assign.role');
Route::get('/admin/create/user', 'AdminController@add_user')->name('create.user');



// INSPECTION routes
Route::get('/inspection/form', 'InspectionController@show_inspection_form')->name('inspection.form');
Route::post('/inspection/submit', 'InspectionController@store_inspection')->name('inspection.checked');
Route::get('/inspection/generate', 'InspectionController@generate_form')->name('generate.form');
Route::get('/inspection/details', 'InspectionController@details')->name('inspection.details');
Route::get('/inspection/add_details', 'InspectionController@add_details')->name('inspection.add');
Route::post('/inspection/add_details', 'InspectionController@store_details')->name('inspection.store');
Route::get('inspection/generate/results', 'InspectionController@generate_results')->name('generate.results');
Route::get('inspection/show/results', 'InspectionController@show_inspection_results')->name('show.results');
