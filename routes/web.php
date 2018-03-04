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
Route::get('/my-requests','InsuranceRequestController@getMyRequests')->name('myrequests.data');
Route::post('/request-updates','InsuranceRequestController@requestUpdate')->name('request-updates');

Route::get('/change-password','AccountController@changePassword');
Route::post('/update-password','AccountController@updatePassword')->name('updatePassword');

Route::get('/my-profile','AccountController@myProfile');
Route::post('/update-profile','AccountController@updateProfile')->name('update-profile');

Route::get('/admin/statistics','AdminController@statistics');
Route::get('/admin/users','AdminController@manageUsers');
Route::get('/admin/insurance-requests','AdminController@allInsuranceRequests');
Route::get('/admin/allrequests','AdminController@allInsRequestsData')->name('allrequests.data');
Route::get('/admin/allusers','AdminController@getUsers')->name('users.data');
Route::get('/admin/users/{id}','AdminController@showUser');
Route::patch('/admin/users','AdminController@updateUser')->name('admin.users.update');

Route::resource('roles','RoleController');
Route::resource('/users','UserController');
Route::resource('permissions','PermissionController');
Route::resource('/payments','PaymentController');
Route::get('/payment/create/{id}', 'PaymentController@create');
Route::get('/payments-data','PaymentController@getPayments')->name('payments.data');
Route::post('/payments/yo/successipnlistener', 'PaymentController@paymentSuccessfull');
Route::post('/payments/yo/failedipnlistener', 'PaymentController@paymentFailed');
