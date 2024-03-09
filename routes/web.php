<?php

Route::get('/login', 'AuthController@login');
Route::post('/login', 'AuthController@checkLogin');
Route::get('/register', 'AuthController@register');
Route::get('/logout', 'AuthController@logout');
Route::post('/NonsaveData','DataController@Nonstore'); 


Route::group(['middleware' => 'auth.admin'], function () {
Route::get('/','DataController@index');
Route::get('/search','DataController@search');
Route::post('/saveData','DataController@store'); 
Route::get('/create', 'DataController@create');
Route::get('/place_create','DataController@place_create');
Route::post('/savePlace', 'DataController@storePlace');
});