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
Route::get('sign_in', function () {
    return view('sign_in');
});
Route::get('log_in', function () {
    return view('log_in');
});
Route::get('forget_password', function () {
    return view('forget_password');
});
Route::get('about', function () {
    return view('about');
});