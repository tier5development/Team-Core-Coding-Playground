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

 Route::auth();

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/create_post' , 'Auth\LoginController@create_form');

Route::get('/create_post', function () {
    return view('create_post');
});

Route::post('/save_post' , 'PostController@store')->name('save_post');

Route::get('/view_post', 'PostController@index')->name('viewposts');


Route::get('/edit_post/{id?}' , 'PostController@edit')->name('edit');


Route::post('/edit_post/{id?}' , 'PostController@update')->name('edit_post');

Route::get('delete/{id}','PostController@destroy');