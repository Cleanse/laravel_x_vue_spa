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

    Route::get('/faqs/display', 'FAQsController@display');
    Route::get('/faqs', 'FAQsController@index');
    Route::get('/faqs/{faq}', 'FAQsController@show');
    Route::post('/faqs', 'FAQsController@store');
    Route::put('/faqs/{faq}', 'FAQsController@update');
    Route::delete('/faqs/{faq}', 'FAQsController@destroy');

    Route::get('/product-types/display', 'ProductTypesController@display');
    Route::get('/product-types', 'ProductTypesController@index');
    Route::get('/product-types/{type}', 'ProductTypesController@show');
    Route::post('/product-types', 'ProductTypesController@store');
    Route::put('/product-types/{faq}', 'ProductTypesController@update');
    Route::delete('/product-types/{faq}', 'ProductTypesController@destroy');

    Route::get('/products', 'ProductsController@index');
    Route::get('/products/{product}', 'ProductsController@show');
});
