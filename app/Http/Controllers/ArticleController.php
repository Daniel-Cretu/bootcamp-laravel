<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\LoggableInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psr\Log\LoggerInterface;

class ArticleController extends Controller
{

    public function show($articleId, Request $request, LoggerInterface $logger)
    {
        $article = Article::findOrFail($articleId);
        $articleComments = Comment::orderby('created_at', 'DESC')->paginate(1)->onEachSide(1);

        $user = $request->user();
        $userRepresentation = $user ? "User with id {$user->id}" : "Unknown User";
        $logger->info(
            $userRepresentation . ' accessed ' . "article with id {$articleId}",
            ["id" => $articleId, 'title' => $article->title],
        );

        return view('pages.article', ['articleComments' => $articleComments, 'article' => $article]);
    }
}
