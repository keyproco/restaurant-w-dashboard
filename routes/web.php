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
use App\Events\UserConfirmedOrder;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::prefix('admin')->middleware('role:superadministrator|administrator|manager')->group(function () {
    Route::get('', 'AdminsController@index')->name('dashboard');
    Route::get('/stats', 'AdminsController@stats');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/by-categories', 'Category@productsByCategories')->name('categories');
Route::get('/current-user', 'HomeController@getCurrentUser');
Route::resource('/order', 'OrderController');

Route::resource('/user-orders', 'UserController');
Route::resource('/users', 'UserController');
Route::resource('/permissions', 'PermissionsController');
Route::resource('/products', 'ProductsController');
Route::post('/pay', 'PaymentController@store');
Route::get('/admin/dashboard/{vue_capture?}', function () {
    return view('layouts.admin');
})->where('vue_capture', '[\/\w\.-]*');

Route::get('/{vue_capture?}', function () {
    return view('home');
})->where('vue_capture', '[\/\w\.-]*');
