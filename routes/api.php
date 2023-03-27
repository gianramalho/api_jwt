<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/produtos', [ProductController::class, 'index'])->name('products');
    Route::get('/produtos/{id}', [ProductController::class, 'show'])->name('show');
    Route::post('/produtos', [ProductController::class, 'store'])->name('products-store');
    Route::post('/produtos/{id}', [ProductController::class, 'update'])->name('products-update');
    Route::delete('/produtos/{id}', [ProductController::class, 'destroy'])->name('products-destroy');
});


Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

