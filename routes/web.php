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
    return 'hello world';
});
Route::get('/formsubmit', 'HomeController@formsubmit');


Route::get('/hello','HomeController@show');


Route::get('/create_message', 'HomeController@create');

Route::post('/see', function () {
    return 'form was submitted successfully';
});


Route::get('/index', [
    'as' => 'laravel.index', 'uses' => 'HomeController@index'
]);


Route::get('/formsubmit', ['as' => 'form_url', 'uses' => 'UserlController@store']);

Route::get('/ticket' , 'TicketController@ticket_counter');

Route::get('/ticket_save' , 'TicketController@store');


Route::get('/viewticket' , 'TicketController@index');


Route::get('/search_contact_no','TicketController@search');