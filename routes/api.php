<?php

use Illuminate\Http\Request;

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
    Route::post('/product-types/featured', 'ProductTypesController@featured');
    Route::get('/product-types', 'ProductTypesController@index');
    Route::get('/product-types/{productType}', 'ProductTypesController@show');
    Route::post('/product-types', 'ProductTypesController@store');
    Route::put('/product-types/{productType}', 'ProductTypesController@update');
    Route::delete('/product-types/{productType}', 'ProductTypesController@destroy');

    Route::get('/templates/display', 'PrintableTemplatesController@display');
    Route::post('/templates/upload', 'PrintableTemplatesController@upload');
    Route::get('/templates', 'PrintableTemplatesController@index');
    Route::get('/templates/{printableTemplate}', 'PrintableTemplatesController@show');
    Route::post('/templates', 'PrintableTemplatesController@store');
    Route::put('/templates/{printableTemplate}', 'PrintableTemplatesController@update');
    Route::delete('/templates/{printableTemplate}', 'PrintableTemplatesController@destroy');

    Route::get('/products', 'ProductsController@index');
    Route::get('/products/{product}', 'ProductsController@show');
});
