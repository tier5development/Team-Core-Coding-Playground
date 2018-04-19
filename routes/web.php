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
    return view('auth.login');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@show')->name('home');

Route::resource('todo','TodoController');
// Route::delete('todo','TodoController@destroy');

/*Route::get('edit', function () {
    return view('auth.edit');
});*/
// Route::get('/home/edit/{id}', 'HomeController@edit');

Route::post('/home', 'HomeController@update');

Route::get('/delete/{id}',[
		'uses'=> 'HomeController@destroy',
		'as' => 'user.delete'
	]);

Route::get('/home/edit/{id}' ,[
        'uses'=>'HomeController@edit',
        'as'=>'user.edit'
    ]);
