<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::select(['id', 'title', 'published_at', 'image'])
//            ->where('published_at', '>=', Carbon::today()->startOfYear())
//            ->where('published_at', '>=', Carbon::today()->endOfYear())
            ->orderby('published_at', 'DESC')
            ->limit(3)
            ->get();

        Article::select(['id', 'title', 'published_at'])
            ->where('published_at', '>=', Carbon::today()->startOfYear())
            ->where('published_at', '>=', Carbon::today()->endOfYear())
            ->orderby('published_at', 'DESC')
            ->limit(5)
            ->get();

        Article::select(['id', 'title', 'published_at'])
            ->where('blog_category_id', '=', 31)
            ->get();

        Article::select(['articles.id', 'articles.title', 'articles.published_at'])
            ->join('blog_categories', 'blog_categories.id', '=', 'articles.id')
            ->where('name', '=', 'Repellat sit quam est laudantium.')->get();

        $products = Product::orderby('name')->limit(4)->get()->all();
        return view('pages.home', ['articles' => $articles, 'products' => $products]);
    }
}
