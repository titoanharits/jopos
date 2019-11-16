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


// route barang
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/barang', 'BarangController@index')->name('barang');
Route::get('/barang/create', 'BarangController@create')->name('createbarang');
Route::post('/barang', 'BarangController@store');


// route Customer
Route::get('/customer', 'CustomerController@index')->name('customer');
Route::get('/customer/create', 'CustomerController@create')->name('createcustomer');
Route::get('/customer/edit/{id}', 'CustomerController@edit')->name('editcustomer');
Route::post('/customer', 'CustomerController@store')->name('storecustomer');
Route::put('/customer/{id}/edit/', 'CustomerController@update')->name('updatecustomer');
Route::delete('/customer/{id}', 'CustomerController@destroy')->name('deletecustomer');


//route Supplier
Route::get('/supplier', 'SupplierController@index')->name('supplier');
Route::get('/supplier/create', 'SupplierController@create')->name('createsupplier');
Route::get('/supplier/edit/{id}', 'SupplierController@edit')->name('edisupplier');
Route::put('/supplier/{id}/edit', 'SupplierController@update')->name('putsupplier');
Route::post('/supplier', 'SupplierController@store')->name('postsupplier');
Route::delete('/supplier/{id}', 'SupplierController@destroy')->name('deletesupplier');
