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



Route::get('/',function()
{
	return view('welcome');
});

Route::get('/register',function()
{
	return view('register');
});

Route::get('/resetP',function()
{
	return view('auth.resetPassword');
});




Route::get('logout', '\App\Http\Controllers\Auth\loginController@logout');



Route::post('/insert', 'UserInsertController@insert');


Route::post('/update','UserInsertController@edit');

// Route::get('list',[
// 	'uses'  => 'UserInsertController@getList',
// 	'as' => 'user.list'
// ]);

Route::post('/loginme','loginController@login');

Route::get('/forgotpassword','loginController@forgot');

Route::post('/forgotpassword','loginController@save_data');


Route::post('/resetP','loginController@reset');


Route::get('/resetP/{token}', [
'uses' => 'loginController@index',

]);





// Route::get('/test', function({
// 	//return view('about');
// 	return view('pages.test');
// });












Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
