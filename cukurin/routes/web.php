<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');


Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::get('/editProfile', 'AdminController@editProfile')->name('edit.profile.admin');
    Route::patch('/editProfile', 'AdminController@updateProfile')->name('edit.profile.admin');
    Route::get('/editPassword', 'AdminController@editPassword')->name('edit.password.admin');
    Route::patch('/editPassword', 'AdminController@updatePassword')->name('edit.password.admin');
    Route::get('users-management', 'AdminController@showUsersManagement')->name('show.users-management');
    Route::post('users-management', 'AdminController@storeDataBarber')->name('store.barber');
    Route::get('users-management/{user}/edit', 'AdminController@editUsersManagement')->name('edit.users-management');
    Route::patch('users-management/{user}', 'AdminController@updateUsersManagement')->name('update.users-management');
    Route::delete('users-management/{user}', 'AdminController@destroyUsersManagement')->name('destroy.users-management');
});

Route::prefix('barber')->middleware('auth')->group(function () {
    Route::get('/', 'BarberController@index')->name('barber.index');
    Route::get('/editProfile', 'BarberController@editProfile')->name('edit.profile.barber');
    Route::patch('/editProfile', 'BarberController@updateProfile')->name('edit.profile.barber');
    Route::get('/editPassword', 'BarberController@editPassword')->name('edit.password.barber');
    Route::patch('/editPassword', 'BarberController@updatePassword')->name('edit.password.barber');
});

Route::prefix('customer')->middleware('auth')->group(function () {
    Route::get('/', 'CustomerController@index')->name('customer.index');
    Route::get('/editProfile', 'CustomerController@editProfile')->name('edit.profile');
    Route::patch('/editProfile', 'CustomerController@updateProfile')->name('edit.profile');
    Route::get('/editPassword', 'CustomerController@editPassword')->name('edit.password');
    Route::patch('/editPassword', 'CustomerController@updatePassword')->name('edit.password');
});
