<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'view'])->name('contact');
Route::post('/contactSend', [ContactController::class, 'send'])->name('contact.send')
    ->middleware('log.activity:sendContact');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/article/{articleId}', [ArticleController::class, 'show'])->name('article');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/productAdd/{productId}', [ProductController::class, 'addProduct'])->name('product.add');
Route::post('/commentSend/{commentId}', [CommentController::class, 'send'])->name('comment.send');
