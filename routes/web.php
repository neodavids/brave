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
})->name('welcome');

Auth::routes();
Route::view('restapi','restapi');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('roles','RoleController');
Route::resource('bookings','BookingController');
Route::resource('issues','IssueController');
Route::resource('shoots','ShootController');
Route::resource('docs','DocController');
Route::resource('shows','ShowController');
Route::resource('messages','MessageController');
Route::resource('departments','DepartmentController');
Route::resource('facilities','FacilityController');

