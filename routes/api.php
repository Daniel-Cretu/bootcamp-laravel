<?php

use App\Http\Controllers\Api\ArticleApiController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\ProductsApiController;
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

Route::middleware('admin:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products', [ProductApiController::class, 'getProducts']);
Route::post('/products', [ProductApiController::class, 'productCreate']);
Route::post('/products/order', [ProductApiController::class, 'orderProducts']);

Route::post('/articles', [ArticleApiController::class, 'articleCreate'])->name('admin.article.edit.post');
Route::post('/articles/{articleId}', [ArticleApiController::class, 'articleEdit'])->name('admin.article.edit.post');
