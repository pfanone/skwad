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

Route::group(['middleware' => ['auth']], function () {

	Route::resource('/', 'SkwadController');
	
});

Route::group(['middleware' => ['auth', 'admin']], function () {


	Route::any('admin/delete/{id}', 'AdminController@delete');
	Route::resource('admin', 'AdminController');
	
});

// Auth Routes
Auth::routes();
