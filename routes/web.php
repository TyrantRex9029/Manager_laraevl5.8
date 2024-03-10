<?php

Route::get('/login', 'AuthController@login');
Route::post('/login', 'AuthController@checkLogin');
Route::get('/register', 'AuthController@register');
Route::get('/logout', 'AuthController@logout');
Route::post('/NonsaveData','Admin\CreateUserController@Nonstore'); 


Route::group(['middleware' => 'auth.admin'], function () {
Route::get('/','Admin\CreateUserController@index');
Route::get('/search','Admin\CreateUserController@search');
Route::post('/saveData','Admin\CreateUserController@store'); 
Route::get('/create', 'Admin\CreateUserController@create');



Route::get('/Province', 'Admin\ProvinceController@index');
Route::post('/Province', 'Admin\ProvinceController@store');

Route::get('/Amphure', 'Admin\AmphureController@index');
Route::post('/Amphure', 'Admin\AmphureController@store');
Route::get('/User/GetAmphur/{province_id}', 'Admin\CreateUserController@GetAmphur');
Route::get('/User/GetZipcode/{amphure_id}', 'Admin\CreateUserController@GetZipcode');

});