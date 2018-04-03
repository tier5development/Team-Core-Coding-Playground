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



Route::get('/', [
	'uses'	=> 'AuthController@home',
	'as'	=>	'project.home'
]);

Route::get('/forgotpw', [
	'uses'	=> 'loginController@forgot',
	'as'	=>	'auth.forgot'
]);



Route::get('/register',function()
{
	return view('register');
});

Route::get('/resetP',function()
{
	return view('auth.resetPassword');
});




Route::get('/logout', 
          [
            'uses' => 'loginController@logout',
            'as'   => 'project.logout'
        ]);

 
 //Route::post('/forgotpw','loginController@forgetPassword');//forget password


 Route::post('/resetP','loginController@resetPassword');//reset password



Route::post('/insert', [
	'uses' 	=>	'UserInsertController@insert',
	'as'	=>	'user.insert'
]);


Route::post('/update','UserInsertController@edit');



Route::post('/loginuser','loginController@login');




Route::post('/forgotpw','loginController@save_data');


// Route::get('/resetP/{token}', [
// 	'uses'	=> 'loginController@forgot',
// 	'as'	=>	'auth.reset'
// ]);



// Route::post('/resetP','loginController@reset');


Route::get('/resetPassword', [
          'uses' => 'loginController@index',
          'as'   => 'project.reset_password_view'
          ]);


       







Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
