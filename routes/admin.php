<?php


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/


// Route::get('/', function () {
//     dd('Welcome to admin user routes.');
// });
Route::get('/','\App\Http\Controllers\Auth\LoginController@index');
Route::get('register','\App\Http\Controllers\Auth\LoginController@register')->name('register');
Route::get('dashboard','\App\Http\Controllers\DashboardController@index')->name('dashboard');


