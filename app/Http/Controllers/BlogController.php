<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        $articles = Article::orderby('created_at', 'DESC')->get()->all();
        return view('pages.blog', ['articles' => $articles]);
    }

    public function show($articleId)
    {
        $articleComments = Comment::orderby('created_at', 'DESC')->get()->all();
        return view('pages.article', ['articleComments' => $articleComments, 'articleId' => $articleId]);
    }
}
