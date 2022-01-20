<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {

        // Articles with title, category name, and others(using on main page) for this month
        $articles = Article::select(['articles.id', 'articles.title', 'articles.published_at', 'articles.image', 'articles.excerpt', 'blog_categories.name'])
            ->where('articles.published_at', '>=', Carbon::today()->startOfMonth())
            ->where('articles.published_at', '<=', Carbon::today()->endOfMonth())
            ->join('blog_categories', 'blog_categories.id', '=', 'articles.blog_category_id')
            ->orderby('articles.published_at', 'DESC')
            ->orderby('articles.title', 'ASC')
            ->get();

        $products = Product::join('products_info', 'products_info.product_id', '=', 'products.id')
            ->where('products.flag', '1')
            ->orderby('name', 'ASC')
            ->limit(4)
            ->get();
        return view('pages.home', ['articles' => $articles, 'products' => $products]);
    }
}
