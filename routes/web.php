<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;

Route::middleware('auth')->group(function () {
Route::get('/',[ClientController::class,'home'])->name('home');
Route::get('/auth/logout',[AuthController::class,'_logout']);

    
    });

Route::middleware('guest')->group(function () {
Route::get('/auth/register',[AuthController::class,'register']);
Route::post('/auth/register',[AuthController::class,'_register']);
Route::get('/auth/login',[AuthController::class,'login'])->name('login');
Route::post('/auth/login',[AuthController::class,'_login']);
});
