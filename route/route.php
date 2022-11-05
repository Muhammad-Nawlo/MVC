<?php

use app\controllers\AdminProductController;
use app\controllers\AuthController;
use app\controllers\ProductController;
use app\core\route\Route;

Route::get('/', [ProductController::class, 'index']);
Route::get('/product', [ProductController::class, 'show']);

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'signIn']);

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'create']);

Route::post('/logout', [AuthController::class, 'logout']);


Route::get('/admin/products', [AdminProductController::class, 'index']);
Route::get('/admin/product', [AdminProductController::class, 'create']);
Route::post('/admin/product', [AdminProductController::class, 'store']);
Route::get('/admin/get-product', [AdminProductController::class, 'show']);
Route::get('/admin/update-product', [AdminProductController::class, 'show_update']);
Route::post('/admin/update-product', [AdminProductController::class, 'update']);
Route::post('/admin/delete-product', [AdminProductController::class, 'destroy']);
