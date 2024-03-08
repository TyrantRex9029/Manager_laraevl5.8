<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\AuthController;

Route::middleware(['auth.admin'])->group(function(){
// หน้าแรก
Route::get('/index', [DataController::class, 'index']);
Route::get('/', [DataController::class, 'index']); 
Route::get('/search',[DataController::class,'search']);
// สรา้งสมาชิก
Route::post('/saveData', [DataController::class, 'store']); 
Route::get('/create', [DataController::class, 'create']);
//test route
Route::get('/place_create',[DataController::class,'place_create']);
Route::post('/savePlace', [DataController::class, 'storePlace']);
});



//ระบบล็อกอิน
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'checkLogin']);
Route::get('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::post('/NonsaveData', [DataController::class, 'Nonstore']); 







