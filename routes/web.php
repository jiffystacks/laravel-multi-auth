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
});

Auth::routes();


Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/login/driver', 'Auth\LoginController@showDriverLoginForm');
##Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
##Route::get('/register/writer', 'Auth\RegisterController@showWriterRegisterForm');

//admin password reset routes
Route::post('/admin/password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('/admin/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('/admin/password/reset','Auth\AdminResetPasswordController@reset')->name('admin.password.update');
Route::get('/admin/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

//driver password reset routes
Route::post('/driver/password/email','Auth\DriverForgotPasswordController@sendResetLinkEmail')->name('driver.password.email');
Route::get('/driver/password/reset','Auth\DriverForgotPasswordController@showLinkRequestForm')->name('driver.password.request');
Route::post('/driver/password/reset','Auth\DriverResetPasswordController@reset')->name('driver.password.update');
Route::get('/driver/password/reset/{token}','Auth\DriverResetPasswordController@showResetForm')->name('driver.password.reset');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/driver', 'Auth\LoginController@driverLogin');

Route::view('/home', 'home')->middleware('auth');
Route::view('/admin', 'admin');
Route::view('/driver', 'driver');

/*Route::group(['middleware' => ['permission:buyer.create|seller.create']], function () {
	Route::get('/buyer-create', function () {
		return view('user.buyer_create');
	});

	Route::get('/seller-create', function () {
		return view('user.seller_create');
	});
});*/


Route::group(['middleware' => ['role:buyer']], function () {
	Route::get('/buyer-create', function () {
		return view('user.buyer_create');
	});
});

Route::group(['middleware' => ['role:seller,buyer']], function () {
	Route::get('/seller-create', function () {
		return view('user.seller_create');
	});
});