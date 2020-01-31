<?php

Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::post('/logout', 'AuthController@logout');
Route::get('/user', 'AuthController@user');

Route::group(['prefix' => 'topics'], function() {
    Route::post('/', 'TopicController@store')->middleware('auth:api');
});
