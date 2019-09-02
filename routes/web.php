<?php

Route::get('/uploadz','FileUploadsController@index')->name('upload.index');
Route::put('/uploadz','FileUploadsController@update')->name('upload.update');

Route::get('/{any}', 'SpaController@index')
    ->where('any', '.*');