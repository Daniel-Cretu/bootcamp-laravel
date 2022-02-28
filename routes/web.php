<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LoginAdminController;
use App\Http\Controllers\Api\ArticleApiController;
use App\Http\Controllers\Api\ProductsApiController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//use App\Http\Controllers\Api\ArticleApiController;
//use App\Http\Controllers\LoginController;
//use App\Http\Controllers\ProductController;
//use App\Http\Controllers\RegisterController;
//use App\Http\Controllers\test;

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

//Route::get('/', [HomeController::class, 'index'])->name('home');
//Route::get('/menu', [MenuController::class, 'index'])->name('menu');
//Route::get('/about', [AboutController::class, 'index'])->name('about');
//Route::get('/contact', [ContactController::class, 'view'])->name('contact');
//Route::post('/contactSend', [ContactController::class, 'send'])->name('contact.send')
//    ->middleware('log.activity:sendContact');
//Route::get('/login', [LoginController::class, 'index'])->name('login');
//Route::get('/register', [RegisterController::class, 'index'])->name('register');
//Route::get('/blog', [BlogController::class, 'index'])->name('blog');
//Route::get('/blog/article/create', [ArticleController::class, 'create']);
//Route::get('/blog/article/edit/{articleId}', [ArticleController::class, 'edit']);
//Route::get('/blog/article/{articleId}', [ArticleController::class, 'show'])->name('article');
//
//
//Route::get('/cart', [CartController::class, 'index'])->name('cart');
//Route::post('/productAdd/{productId}', [ProductController::class, 'addProduct'])->name('product.add');
//Route::get('/product/{productId}', [ProductController::class, 'index'])->name('product');
//Route::post('/commentSend/{commentId}', [CommentController::class, 'send'])->name('comment.send');
//
//Route::get('/api/articles/most-popular',  [ArticleApiController::class, 'readMostPopularArticles']);
//Route::get('/api/articles',  [ArticleApiController::class, 'readAllArticles']);
//Route::get('/api/articles/{id}',  [ArticleApiController::class, 'readOneArticle']);
//Route::delete('/api/articles/{id}',  [ArticleApiController::class, 'deleteArticle']);
//Route::post('/api/articles/',  [ArticleApiController::class, 'createArticle']);
//Route::post('/api/articles/{articleId}', [ArticleApiController::class, 'editArticle']);

// New Routes
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
