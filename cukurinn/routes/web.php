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

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::get('/editProfile', 'AdminController@editProfile')->name('edit.profile.admin');
    Route::patch('/editProfile', 'AdminController@updateProfile')->name('edit.profile.admin');
    Route::get('/editPassword', 'AdminController@editPassword')->name('edit.password.admin');
    Route::patch('/editPassword', 'AdminController@updatePassword')->name('edit.password.admin');
    Route::get('users-management', 'AdminController@showUsersManagement')->name('show.users-management');
    Route::post('users-management', 'AdminController@storeDataPetshop')->name('store.petshop');
    Route::get('users-management/{user}/edit', 'AdminController@editUsersManagement')->name('edit.users-management');
    Route::patch('users-management/{user}', 'AdminController@updateUsersManagement')->name('update.users-management');
    Route::delete('users-management/{user}', 'AdminController@destroyUsersManagement')->name('destroy.users-management');
});

Route::prefix('salon')->middleware('auth')->group(function () {
    Route::get('/', 'SalonbarberController@index')->name('salon.index');
    Route::get('/editProfile', 'SalonbarberController@editProfile')->name('edit.profile.salon');
    Route::patch('/editProfile', 'SalonbarberController@updateProfile')->name('edit.profile.salon');
    Route::get('/editPassword', 'SalonbarberController@editPassword')->name('edit.password.salon');
    Route::patch('/editPassword', 'SalonbarberController@updatePassword')->name('edit.password.salon');
});

Route::prefix('customer')->middleware('auth')->group(function () {
    Route::get('/', 'CustomerController@index')->name('customer.index');
    Route::get('/editProfile', 'CustomerController@editProfile')->name('edit.profile');
    Route::patch('/editProfile', 'CustomerController@updateProfile')->name('edit.profile');
    Route::get('/editPassword', 'CustomerController@editPassword')->name('edit.password');
    Route::patch('/editPassword', 'CustomerController@updatePassword')->name('edit.password');
});