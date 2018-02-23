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

Route::get('/','Auth\LoginController@showLoginForm');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/insurance-request','InsuranceRequestController');

Route::get('/change-password','AccountController@changePassword');
Route::post('/update-password','AccountController@updatePassword')->name('updatePassword');

Route::get('/my-profile','AccountController@myProfile');
Route::post('/update-profile','AccountController@updateProfile')->name('updateProfile');

Route::get('/admin/users','AdminController@manageUsers');
Route::get('/admin/insurance-requests','AdminController@allInsuranceRequests');
