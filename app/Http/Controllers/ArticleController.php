<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
//    public function index($articleId)
//    {
//        $articleComments = Comment::orderby('created_at', 'DESC')->get()->all();
//        return view('pages.article', ['articleComments' => $articleComments, 'articleId' => $articleId]);
//    }

    public function show($articleId)
    {
        $article = Article::findOrFail($articleId);
        $articleComments = Comment::orderby('created_at', 'DESC')->get()->all();
        return view('pages.article', ['articleComments' => $articleComments, 'article' => $article]);
    }
}
