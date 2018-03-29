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

//Get Requests
    Route::get('/', [
      'uses'  => 'UserController@home',
      'as'    =>  'project.home'
    ]);

    Route::get('/logout', 
      [
        'uses' => 'UserController@logout',
        'as'   => 'project.logout'
    ]);

    Route::get('/about', function () {
        return view('about');
    });
    
    Route::get('/register', function () {
        return view('user.create');
    });

    Route::get('/login', function () {
        return view('user.login');
    });

    Route::get('/forgotPassword', function () {
        return view('user.forgotPassword');
    });

    Route::get('/resetPassword/{token}', [
      'uses' => 'resetPasswordController@index',
      'as'   => 'project.reset_password_view'
      ]);




      //Route::get('/gotoRPC','resetPasswordController@');


//Post Requests
    //Register
    Route::post('/nuser','UserController@create');
    //Login
    Route::post('/ulogin','UserController@dologin');
    //ForgetPassword
    Route::post('/forget','resetPasswordController@forgetPassword');
    //createNewPassword
    Route::post('/newpass','resetPasswordController@newPassword');






/*s*/
/*Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/forgotPassword', function () {
    return view('forgotPassword');
});
Route::get('/test', function () {
    return view('test');
});


Route::get('/about', function () {
  $name = 'Durgesh';
  $tasks =[
    'Task number one',
    'Task number two',
    'Task number three'
  ];
    return view('about',['name' => $name],compact('tasks'));
});*/
 