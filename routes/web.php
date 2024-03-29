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
Route::resource('components', 'ComponentController');
Route::post('report', 'ReportController@generate')->name('report.generate');
Route::get('/report/show', 'ReportController@show')->name('report.show');
Route::get('report', 'ReportController@index')->name('report.index');


// ADMIN ROUTES
Route::get('/admin/users', 'AdminController@manage_users')->name('manage.users');
Route::get('/admin/users/{id}', 'AdminController@manage_user')->name('manage.user');
Route::post('/admin/users/{id}', 'AdminController@assign_roles')->name('assign.role');
Route::get('/admin/create/user', 'AdminController@add_user')->name('create.user');
Route::post('/admin/store/user', 'AdminController@store_user')->name('store.user');
Route::get('/admin/edit/user/{id}', 'AdminController@edit_user')->name('edit.user');
Route::put('/admin/update/user/{id}', 'AdminController@update_user')->name('update.user');

// Training Operation

Route::get('/admin/training/operation', 'TrainingController@index_attendance')->name('operation.index');
Route::post('/admin/training/operation/store', 'TrainingController@store_attendance')->name('store.attendance');
Route::get('/admin/training/operation/{id}', 'TrainingController@show_attendance')->name('operation.show');
Route::put('/admin/training/status/{id}', 'TrainingController@close_event')->name('close.event');

// Training
Route::get('/admin/training', 'TrainingController@index')->name('training.index');
Route::get('/admin/training/create', 'TrainingController@create')->name('training.create');
Route::post('/admin/training/store', 'TrainingController@store')->name('training.store');
Route::get('/admin/training/{id}', 'TrainingController@show')->name('training.show');
Route::get('/admin/training/edit/{id}', 'TrainingController@edit')->name('training.edit');
Route::put('/admin/training/update/{id}', 'TrainingController@update')->name('training.update');
Route::delete('/admin/training/delete/{id}', 'TrainingController@delete')->name('training.delete');

// INSPECTION routes
Route::get('/inspection/form', 'InspectionController@show_inspection_form')->name('inspection.form');
Route::post('/inspection/submit', 'InspectionController@store_inspection')->name('inspection.checked');
Route::get('/inspection/generate', 'InspectionController@generate_form')->name('generate.form');
Route::get('/inspection/details', 'InspectionController@details')->name('inspection.details');
Route::get('/inspection/add_details', 'InspectionController@add_details')->name('inspection.add');
Route::post('/inspection/add_details', 'InspectionController@store_details')->name('inspection.store');
Route::get('inspection/generate/results', 'InspectionController@generate_results')->name('generate.results');
Route::get('inspection/show/results', 'InspectionController@show_inspection_results')->name('show.results');

//PROJECTS 
Route::get('/projects', 'ProjectController@index')->name('project.index');
Route::get('/projects/create', 'ProjectController@create')->name('project.create');
Route::get('/projects/edit/{id}', 'ProjectController@edit')->name('project.edit');
Route::post('/projects/update/{id}', 'ProjectController@update')->name('project.update');
Route::get('/projects/delete/{id}', 'ProjectController@destroy')->name('project.delete');
Route::post('/projects/store', 'ProjectController@store')->name('project.store');

//TASKS
Route::get('/tasks','TaskController@index')->name('task.index');
Route::get('/tasks/view/{id}','TaskController@view')->name('task.view');
Route::get('/tasks/create', 'TaskController@create')->name('task.create');
Route::post('/tasks/store', 'TaskController@store')->name('task.store');
Route::get('/tasks/search', 'TaskController@searchTask')->name('task.search');
Route::get('/tasks/sort/{key}', 'TaskController@sort')->name('task.sort');
Route::get('/tasks/edit/{id}','TaskController@edit')->name('task.edit');
Route::get('/tasks/list/{projectid}','TaskController@tasklist')->name('task.list');
Route::get('/tasks/delete/{id}', 'TaskController@destroy')->name('task.delete') ;
Route::get('/tasks/deletefile/{id}', 'TaskController@deleteFile')->name('task.deletefile');
Route::post('/tasks/update/{id}', 'TaskController@update')->name('task.update') ;
Route::get('/tasks/completed/{id}','TaskController@completed')->name('task.completed');

//USERS TASK ASSIGNMENT
Route::get('/users', 'UserController@index')->name('user.index'); 
Route::get('/users/list/{id}','UserController@userTaskList')->name('user.list');
Route::get('/users/create', 'UserController@create')->name('user.create'); 
Route::post('/users/store', 'UserController@store')->name('user.store'); 
Route::get('/users/edit/{id}', 'UserController@edit')->name('user.edit'); 
Route::post('/users/update/{id}', 'UserController@update')->name('user.update') ;
Route::get('/users/activate/{id}', 'UserController@activate')->name('user.activate') ; 
Route::get('/users/delete/{id}', 'UserController@destroy')->name('user.delete') ;
Route::get('/users/disable/{id}', 'UserController@disable')->name('user.disable') ;