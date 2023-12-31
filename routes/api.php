<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;

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

Route::get('/show/new/product/list',[ApiController::class,'showNewProductList']);
Route::get('/show/hot/product/list',[ApiController::class,'showHotProductList']);
Route::get('/show/discount/product/list',[ApiController::class,'showDiscountProductList']);
Route::post('/add/to/cart',[ApiController::class,'addToCart']);
