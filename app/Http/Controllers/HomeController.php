<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function show()
    {
        $articles = Article::select(['articles.id', 'articles.title', 'articles.published_at', 'articles.image', 'articles.excerpt', 'blog_categories.name'])
            ->where('articles.published_at', '>=', Carbon::today()->startOfMonth())
            ->where('articles.published_at', '<=', Carbon::today()->endOfMonth())
            ->join('blog_categories', 'blog_categories.id', '=', 'articles.blog_category_id')
            ->orderby('articles.published_at', 'DESC')
            ->orderby('articles.title', 'ASC')
            ->get();

        $products = Product::select('products.id', 'products.name', 'products.price', 'products_info.image_location')
            ->join('products_info', 'products_info.product_id', '=', 'products.id')
            ->where('products.flag', '1')
            ->orderby('name', 'ASC')
            ->limit(4)
            ->get();

        return view('home.show', ['articles' => $articles, 'products' => $products]);
    }
}
