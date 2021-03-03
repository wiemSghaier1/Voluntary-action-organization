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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/allevents', 'eventController@allevents');

Route::get('/addevent', 'eventController@add');


Route::get('/eventdetails/{id}', 'eventController@details')->middleware('auth');
Route::get('/createevent', 'eventcontroller@createevent')->middleware('auth');
Route::post('/createevent', 'eventcontroller@createevent');


Route::post('/location', 'eventController@location');

Route::get('/joinevent/{id}', 'eventcontroller@joinevent')->middleware('auth');
Route::get('/quitevent/{id}', 'eventcontroller@quitevent')->middleware('auth');


//Route::get('/location', 'eventController@searchlocation');
