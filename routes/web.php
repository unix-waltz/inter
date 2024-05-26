<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;

Route::get('/auth/logout',[AuthController::class,'_logout'])->middleware('auth');
Route::middleware(['auth', 'useRole:user'])->group(function () {
Route::get('/user/product/detail/{id}',[ClientController::class,'detailproduct']);
Route::get('/myorders',[ClientController::class,'myorders']);
Route::get('/',[ClientController::class,'home'])->name('home');
Route::post('/order/product/',[ClientController::class,'order']);
    });
Route::middleware(['auth', 'useRole:admin'])->group(function () {
Route::get('/admin/dashboard',[AdminController::class,'dashboard']);    
Route::get('/admin/orders',[AdminController::class,'orders']);    
Route::get('/admin/pending',[AdminController::class,'pending']);    
Route::post('/new/product',[AdminController::class,'newproduct']);    
Route::get('/detail/product/{id}',[AdminController::class,'detailproduct']);
Route::get('/delete/product/{id}',[AdminController::class,'deleteproduct']);
Route::post('/edit/product/',[AdminController::class,'editproduct']); 
Route::get('/admin/accept/{id}',[AdminController::class,'setorderproduct']);   
Route::get('/admin/complete/{id}',[AdminController::class,'setcompleteproduct']);   
Route::get('/admin/reject/{id}',[AdminController::class,'setrejectproduct']);   
    });
Route::middleware('guest')->group(function () {
Route::get('/auth/register',[AuthController::class,'register']);
Route::post('/auth/register',[AuthController::class,'_register']);
Route::get('/auth/login',[AuthController::class,'login'])->name('login');
Route::post('/auth/login',[AuthController::class,'_login']);
});
