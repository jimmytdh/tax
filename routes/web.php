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


Route::get('/employee','EmployeeCtrl@index');

Route::get('/upload','ProcessCtrl@index');
Route::post('/upload','ProcessCtrl@importCsv');

Route::post('/tax/employee','TaxCtrl@taxPerEmployee');

Route::get('/load/employee/year','LoadCtrl@employeeYear');


Route::get('/library/designation','LibraryCtrl@designation');
