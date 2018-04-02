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

Route::get('logout',[
		'uses' => 'UserController@logout',
		'as' => 'project.logout'
	]);


Route::get('about', function () {
    return view('about');
});
Route::get('users', function () {
    return view('users');
});

Route::post('newuser', 'UserController@register');

Route::post('login', 'UserController@loginf');

Route::post('frgt', 'RstPswrdController@frgt');


Route::get('homepage',[
		'uses' => 'UserController@homepage',
		'as' => 'project.homepage'
	]);

Route::middleware(['UserAuthenticate'])->group(function(){
	Route::get('sign_in', function () {
    return view('sign_in');
});
Route::get('change_password/{token}',[
	'uses' 	=> 'RstPswrdController@reset_password_view',
	'as'	=>	'project.reset_password_view'
]);
Route::get('log_in',[
		'uses' => 'UserController@log_in',
		'as' => 'project.log_in'
	]);
Route::get('forget_password', function () {
    return view('forget_password');
});
});