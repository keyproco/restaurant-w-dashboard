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
});
Route::post('/new-order', 'UserController@newOrder');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/by-categories', 'Category@productsByCategories')->name('categories');
Route::get('/current-user', 'HomeController@getCurrentUser');


Route::get('/{vue_capture?}', function () {
 return view('home');
})->where('vue_capture', '[\/\w\.-]*');





	Route::resource('/users', 'UserController');
	Route::resource('/permissions', 'PermissionsController');
	Route::resource('/products', 'ProductsController');