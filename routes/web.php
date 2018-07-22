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
Route::prefix('admin')->middleware('role:superadministrator|administrator|manager')->group(function() {
	Route::get('', 'AdminsController@index')->name('dashboard');
	Route::get('/dashboard', 'AdminsController@dashboard')->name('admin.dashboard');
	Route::resource('/users', 'UserController');
	Route::resource('/permissions', 'PermissionsController');
	Route::resource('/products', 'ProductsController');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/current-user', 'HomeController@getCurrentUser');

