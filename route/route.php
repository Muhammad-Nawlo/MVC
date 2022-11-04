<?php

use app\controllers\AuthController;
use app\controllers\ProductController;
use app\core\route\Route;

Route::get('/',[ProductController::class,'index']);

Route::get('/login',[AuthController::class,'login']);
Route::post('/login',[AuthController::class,'signIn']);

Route::get('/register',[AuthController::class,'register']);
Route::post('/register',[AuthController::class,'create']);

Route::post('/logout',[AuthController::class,'logout']);



Route::get('/admin/products',[AdminProductController::class,'index']);
