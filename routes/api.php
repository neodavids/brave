<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login','Auth\LoginController@login');
Route::post('register','Auth\RegisterController@register');
Route::apiResource('roles','RoleController');
Route::apiResource('bookings','BookingController');
Route::apiResource('issues','IssueController');
Route::apiResource('shoots','ShootController');
Route::apiResource('docs','DocController');
Route::apiResource('shows','ShowController');
Route::apiResource('messages','MessageController');
Route::apiResource('departments','DepartmentController');
Route::apiResource('facilities','FacilityController');

