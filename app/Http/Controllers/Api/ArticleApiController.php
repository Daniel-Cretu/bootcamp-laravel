<?php

namespace App\Http\Controllers\Api;

use App\Models\Article;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Services\ModelLogger;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\Str;

class ArticleApiController
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

    /**
     * Creates new article from provided data
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function articleCreate(Request $request): JsonResponse
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255', 'min:5'],
            'description' => ['required', 'string', 'min:5'],
            'category' => 'required|numeric',
            'author' => 'required|numeric',
            'image' => 'image'
        ]);

        $article = Article::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'author_id' => $request->input('author'),
            'image' => $request->file('image')->store('/', 'public'),
            'excerpt' => Str::limit($request->input('description')),
            'blog_category_id' => $request->input('category'),
            'seo_title' => $request->input('title'),
            'seo_description' => Str::limit($request->input('description'), 200),
        ]);

        return $this->responseFactory->json(['id' => $article->id], 201);
    }

    /**
     * Edit an existing article using provided data
     *
     * @param $articleId
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function articleEdit($articleId, Request $request): JsonResponse
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255', 'min:5'],
            'description' => ['required', 'string', 'min:5'],
            'category' => 'required|numeric',
            'author' => 'required|numeric',
        ]);

        $article = Article::find($articleId);

        $article->title = $request->input('title');
        $article->description = $request->input('description');
        $article->author_id = $request->input('author');
        if($request->file('image')) {
            $article->image = $request->file('image')->store('/', 'public');
        }
        $article->excerpt = Str::limit($request->input('description'));
        $article->blog_category_id = $request->input('category');
        $article->seo_title = $request->input('title');
        $article->seo_description = Str::limit($request->input('description'), 200);

        $article->save();

        return $this->responseFactory->json(['id' => $articleId], 201);
    }
}
