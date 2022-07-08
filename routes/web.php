<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\API\AuthController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\ProductController;
//use \App\Http\Controllers\Front\ProductController;
use \App\Http\Controllers\CategoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::post('signin', [AuthController::class, 'signin'])->name('signin');
Route::post('registration', [AuthController::class, 'signup'])->name('registration');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [\App\Http\Controllers\Front\ProductController::class, 'get_products']);
Route::get('/product/{id}', [\App\Http\Controllers\Front\ProductController::class, 'get_product']);
Route::get('/product_filter/{id}', [\App\Http\Controllers\Front\ProductController::class, 'filter']);
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::get('/registration', function () {
    return view('auth.register');
});
Route::middleware(['auth:sanctum', 'verified'])->prefix('admin')->group(function () {
    Route::get('/', function () {return view('admin.home');});
    Route::resources([
        'categories' => CategoryController::class,
        'users' => UserController::class,
        'products' => ProductController::class
    ]);
});
