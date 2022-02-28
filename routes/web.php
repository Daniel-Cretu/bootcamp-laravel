<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

//Navigation
Route::get('', [HomeController::class, 'show'])->name('home');
Route::get('/menu', [MenuController::class, 'show'])->name('menu');

Route::get('/blog/categories/{categoryId?}', [BlogController::class, 'show'])->name('blog');

//Articles
Route::get('/articles/{articleId}', [ArticleController::class, 'show'])->name('article.show');
Route::post('/articles/{articleId}/comments', [CommentController::class, 'add'])->name('article.comment');


Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::get('/about', [AboutController::class, 'show'])->name('about');

//Admin
Route::group(['prefix' => '/admin', 'middleware' => ['auth']], function () {
    Route::get('/article', [AdminController::class, 'articleCreate'])->name('admin.article.create');
    Route::get('/article/{articleId}', [AdminController::class, 'articleEdit'])->name('admin.article.edit');
    Route::get('/product', [AdminController::class, 'productCreate'])->name('admin.product.create');
});
