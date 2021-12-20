<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::orderby('created_at', 'DESC')->limit(3)->get()->all();
        $products = Product::orderby('name')->limit(4)->get()->all();
        return view('pages.home', ['articles' => $articles, 'products' => $products]);
    }
}
