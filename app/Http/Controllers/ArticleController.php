<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Comment;
use App\Models\LoggableInterface;
use App\Services\ModelLogger;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;
use Psr\Log\LoggerInterface;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;

class ArticleController extends Controller
{
    /** @var ResponseFactory */
    private $responseFactory;

    /**
     * @param ResponseFactory $responseFactory
     */
    public function __construct(ResponseFactory $responseFactory)
    {
        $this->responseFactory = $responseFactory;
    }

    public function show($articleId, Request $request, ModelLogger $logger)
    {
        $article = Article::findOrFail($articleId);
        $articleComments = Comment::orderby('created_at', 'DESC')->paginate(1)->onEachSide(1);

        $logger->logModel($request->user(), $article);

        return view('pages.article', ['articleComments' => $articleComments, 'article' => $article]);
    }

    public function update($articleId, ArticleRequest $request): JsonResponse
    {
        $article = Article::find($articleId);
        if($article){
            try {
                $article->title = $request->title;
                $article->save();
                // Successfully updated
                return $this->responseFactory->json(['id' => $article->id], 200);
            } catch (\Throwable $e) {
                // Invalid update
                return $this->responseFactory->json(['error' => 'An error occurred when trying to update article!'], 200);
            }
        }

        // Not found
        return $this->responseFactory->json(null, 404);
    }
}
