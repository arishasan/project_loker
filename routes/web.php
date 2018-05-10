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

Route::auth();

	Route::group(['middleware' => 'auth'],function(){

		Route::get('/','HomeController@index');
		
		Route::get('seller','SellerController@index');
		Route::post('Seller/simpan','SellerController@simpan');
		Route::post('Seller/update','SellerController@update');
		Route::post('Seller/destroy','SellerController@destroy');

		Route::get('price','PriceController@index');
		Route::post('Price/simpan','PriceController@simpan');
		Route::post('Price/update','PriceController@update');
		Route::post('Price/destroy','PriceController@destroy');

		Route::get('customer','CustomerController@index');
		Route::post('Customer/simpan','CustomerController@simpan');
		Route::post('Customer/update','CustomerController@update');
		Route::post('Customer/destroy','CustomerController@destroy');

		Route::get('transaksi/sewa','SewaController@index');
		Route::post('transaksi/simpan','SewaController@simpan');

		Route::get('setting','HomeController@settingIndex');
		Route::post('setting/simpan','HomeController@simpan_setting');

		Route::get('user/password','HomeController@ubah_passwordIndex');
		Route::post('password/simpan','HomeController@simpan_ubah_password');

	});
