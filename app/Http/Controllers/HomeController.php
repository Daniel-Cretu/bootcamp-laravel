<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::orderby('created_at', 'DESC')->limit(3)->get()->all();
        return view('pages.home', ['articles' => $articles]);
//        return view('pages.home');
    }
}
