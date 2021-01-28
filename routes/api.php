<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('developers', 'DeveloperController@index');
Route::group(['prefix' => 'developer'], function () {
    Route::post('add', 'DeveloperController@add');
    Route::get('edit/{id}', 'DeveloperController@edit');
    Route::post('update/{id}', 'DeveloperController@update');
    Route::delete('delete/{id}', 'DeveloperController@delete');
    Route::post('deletedevs/{id}','DeveloperController@delete_user');
});