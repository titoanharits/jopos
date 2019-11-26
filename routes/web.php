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
Route::get('/barang/edit/{id_barang}', 'BarangController@edit')->name('editbarang');
Route::post('/barang', 'BarangController@store')->name('storebarang');
Route::put('/barang/{id}/edit', 'BarangController@update')->name('updatebarang');


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
Route::get('/supplier/edit/{id}', 'SupplierController@edit')->name('editsupplier');
Route::put('/supplier/{id}/edit', 'SupplierController@update')->name('updatesupplier');
Route::post('/supplier', 'SupplierController@store')->name('storesupplier');
Route::delete('/supplier/{id}', 'SupplierController@destroy')->name('deletesupplier');

//route pembelians
Route::get('pembelian', 'PembelianController@index')->name('pembelian');
Route::get('pembelian/fetch/{id}', 'PembelianController@fetch')->name('fetchsupplier');
Route::get('pembelian/create/{id}', 'PembelianController@create')->name('createpembelian');
Route::post('pembelian/barang/', 'PembelianController@tambahBarang')->name('tambahbarang');
Route::post('pembelian', 'PembelianController@store')->name('storepembelian');
Route::get('pembelian/barang/{id}', 'PembelianController@barang')->name('fetchbarang');
