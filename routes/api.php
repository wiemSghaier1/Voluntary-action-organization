<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('/events', 'eventController');
Route::get('/realized', 'eventController@realized');
Route::apiResource('/types', 'typeController');
Route::get('event/{type}', 'eventcontroller@partype');
Route::get('event/{id}', 'eventcontroller@detail');



/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/