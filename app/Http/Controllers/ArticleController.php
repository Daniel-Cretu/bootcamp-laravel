<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\LoggableInterface;
use App\Services\ModelLogger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psr\Log\LoggerInterface;

class ArticleController extends Controller
{

    public function show($articleId, Request $request, ModelLogger $logger)
    {
        $article = Article::findOrFail($articleId);
        $articleComments = Comment::orderby('created_at', 'DESC')->paginate(1)->onEachSide(1);

        $logger->logModel($request->user(), $article);

        return view('pages.article', ['articleComments' => $articleComments, 'article' => $article]);
    }
}
