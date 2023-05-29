<?php

use App\Http\Controllers\ApiController;
use Facade\FlareClient\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', [ApiController::class, 'login'])->name('login');
Route::get('/show_categories', [ApiController::class, 'showCategory'])->name('categories');
Route::get('/show_products', [ApiController::class, 'showProduct'])->name('product');
Route::get('/show_product/{id}', [ApiController::class, 'show_product']);
Route::post('/store_product', [ApiController::class, 'storeProduct'])->name('store.product');
Route::post('/update_product/{id}', [ApiController::class, 'updateProduct']);
Route::delete('/delete_product/{id}', [ApiController::class, 'deleteProduct']);
