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
    // Data Voucher
    Route::get('DataVoucher', 'DataVoucherController@show')->name('show.DataVoucher');
    Route::post('DataVoucher', 'DataVoucherController@store')->name('store.DataVoucher');
    Route::get('DataVoucher/{datavoucher}/edit', 'DataVoucherController@edit')->name('edit.DataVoucher');
    Route::patch('DataVoucher/{datavoucher}', 'DataVoucherController@update')->name('update.DataVoucher');
    Route::delete('DataVoucher/{datavoucher}', 'DataVoucherController@destroy')->name('destroy.DataVoucher');
    // Data Informasi
    Route::get('DataInformasi', 'DataInformasiController@show')->name('show.DataInformasi');
    Route::post('DataInformasi', 'DataInformasiController@store')->name('store.DataInformasi');
    Route::get('DataInformasi/create', 'DataInformasiController@create')->name('create.DataInformasi');
    Route::get('DataInformasi/{datainformasi}/edit', 'DataInformasiController@edit')->name('edit.DataInformasi');
    Route::patch('DataInformasi/{datainformasi}', 'DataInformasiController@update')->name('update.DataInformasi');
    Route::delete('DataInformasi/{datainformasi}', 'DataInformasiController@destroy')->name('destroy.DataInformasi');
});

Route::prefix('barber')->middleware('auth')->group(function () {
    Route::get('/', 'BarberController@index')->name('barber.index');
    Route::get('/editProfile', 'BarberController@editProfile')->name('edit.profile.barber');
    Route::patch('/editProfile', 'BarberController@updateProfile')->name('edit.profile.barber');
    Route::get('/editPassword', 'BarberController@editPassword')->name('edit.password.barber');
    Route::patch('/editPassword', 'BarberController@updatePassword')->name('edit.password.barber');
    // Data Layanan
    Route::get('DataLayanan', 'DataLayananController@showDataLayanan')->name('show.DataLayanan');
    Route::post('DataLayanan', 'DataLayananController@storeDataLayanan')->name('store.DataLayanan');
    Route::get('DataLayanan/{datalayanan}/edit', 'DataLayananController@editDataLayanan')->name('edit.DataLayanan');
    Route::patch('DataLayanan/{datalayanan}', 'DataLayananController@updateDataLayanan')->name('update.DataLayanan');
    Route::delete('DataLayanan/{datalayanan}', 'DataLayananController@destroyDataLayanan')->name('destroy.DataLayanan');
});

Route::prefix('customer')->middleware('auth')->group(function () {
    Route::get('/', 'CustomerController@index')->name('customer.index');
    Route::get('/editProfile', 'CustomerController@editProfile')->name('edit.profile');
    Route::patch('/editProfile', 'CustomerController@updateProfile')->name('edit.profile');
    Route::get('/editPassword', 'CustomerController@editPassword')->name('edit.password');
    Route::patch('/editPassword', 'CustomerController@updatePassword')->name('edit.password');
    Route::get('/DataLayananCustomer', 'DataLayananController@datalayanan_customer')->name('show.DataLayananCustomer');
    Route::get('/DataVoucherCustomer', 'DataVoucherController@datavoucher_customer')->name('show.DataVoucherCustomer');
    Route::get('/DataInformasiCustomer', 'DataInformasiController@datainformasi_customer')->name('show.DataInformasiCustomer');
    Route::get('/DetailDataInformasiCustomer', 'DataInformasiController@detaildatainformasi_customer')->name('show.DetailDataInformasiCustomer');
});
