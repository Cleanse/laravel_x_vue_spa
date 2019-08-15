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

Route::namespace('Api')->group(function () {
    Route::get('/users', 'UsersController@index');
    Route::post('/users', 'UsersController@store');
    Route::get('/users/{user}', 'UsersController@show');
    Route::put('/users/{user}', 'UsersController@update');
    Route::delete('/users/{user}', 'UsersController@destroy');

    Route::get('/faqs', 'FAQsController@index');
    Route::post('/faqs', 'FAQsController@store');
    Route::get('/faqs/{faq}', 'FAQsController@show');
    Route::put('/faqs/{faq}', 'FAQsController@update');
    Route::delete('/faqs/{faq}', 'FAQsController@destroy');
});
