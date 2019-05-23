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
    return redirect(route('dashboard'));
})->middleware('auth');



Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/profile', 'ProfileController@index')->name('profile');

Route::post('/profile/{id}/update', 'ProfileController@update_profile')->name('profile.update');

Route::get('/users/{id}/disable', 'UserController@disable')->name('users.disable');

Route::get('/users/{id}/enable', 'UserController@enable')->name('users.enable');

Route::post('/users/{id}/change_password', 'UserController@change_password')->name('users.change_password');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('advanced', 'ConfigViewController');

Route::resource('property', 'PropertyController');

Route::get('property/{id}/invoice', 'PropertyController@property_invoice')->name('property-invoice');

Route::get('property/{id}/print-invoice', 'PropertyController@print_invoice')->name('property-print_invoice');

Route::get('property/{id}/pdf', 'PropertyController@pdf')->name('pdf');

Route::resource('payment', 'PaymentController');

Route::get('payment/{id}/receipt', 'PaymentController@payment_invoice')->name('payment-invoice');

Route::get('property/{id}/payment-receipt', 'PaymentController@print_payment_invoice')->name('payment-receipt');

Route::resource('customer', 'CustomerController');

Route::resource('agent', 'AgentController');

Route::resource('land_lord' , 'LandLordController');

Route::resource('construction' , 'ConstructionController');

Route::resource('users', 'UserController');

Route::resource('roles' , 'RoleController');

Route::resource('report', 'ReportController');
