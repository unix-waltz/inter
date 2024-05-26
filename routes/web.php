<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;

Route::middleware(['auth', 'useRole:user'])->group(function () {
Route::get('/',[ClientController::class,'home'])->name('home');
Route::get('/auth/logout',[AuthController::class,'_logout']);
    });
Route::middleware(['auth', 'useRole:admin'])->group(function () {
Route::get('/admin/dashboard',[AdminController::class,'dashboard']);    
Route::post('/new/product',[AdminController::class,'newproduct']);    
Route::get('/detail/product/{id}',[AdminController::class,'detailproduct']);
Route::get('/delete/product/{id}',[AdminController::class,'deleteproduct']);
Route::post('/edit/product/',[AdminController::class,'editproduct']);    
    });
Route::middleware('guest')->group(function () {
Route::get('/auth/register',[AuthController::class,'register']);
Route::post('/auth/register',[AuthController::class,'_register']);
Route::get('/auth/login',[AuthController::class,'login'])->name('login');
Route::post('/auth/login',[AuthController::class,'_login']);
});
