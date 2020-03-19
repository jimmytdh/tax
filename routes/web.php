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

Route::get('/','HomeCtrl@index');

Route::get('/logout','LoginCtrl@logoutUser');
Route::get('/login','LoginCtrl@index')->middleware('isLogin');
Route::post('/login/validate','LoginCtrl@validateLogin');

//EMPLOYEE
Route::get('/employee','EmployeeCtrl@index');
Route::post('/employee/save','EmployeeCtrl@save');
Route::post('/employee/search','EmployeeCtrl@search');
Route::get('/employee/delete/{id}','EmployeeCtrl@delete');
Route::get('/employee/{id}','EmployeeCtrl@edit');
Route::post('/employee/{id}','EmployeeCtrl@update');
//END EMPLOYEE

Route::get('/upload','ProcessCtrl@index');
Route::post('/upload','ProcessCtrl@importCsv');

Route::post('/tax/employee','TaxCtrl@taxPerEmployee');

Route::get('/load/employee/year','LoadCtrl@employeeYear');


//LIBRARIES
Route::get('/library/designation','LibraryCtrl@designation');
Route::post('/library/designation/save','LibraryCtrl@designationSave');
Route::post('/library/designation/search','LibraryCtrl@designationSearch');
Route::get('/library/designation/{id}','LibraryCtrl@designationEdit');
Route::post('/library/designation/{id}','LibraryCtrl@designationUpdate');


Route::get('/library/sg','LibraryCtrl@sg');
Route::post('/library/sg/update/','LibraryCtrl@updateSg');
Route::post('/library/year','LibraryCtrl@updateYear');
