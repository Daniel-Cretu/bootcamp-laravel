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
            ->orderby('published_at', 'DESC')
            ->limit(3)
            ->get();

        $products = Product::orderby('name')->limit(4)->get()->all();
        return view('pages.home', ['articles' => $articles, 'products' => $products]);
    }
}
