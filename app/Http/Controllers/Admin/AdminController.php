<?php

namespace App\Http\Controllers\Admin;

//use App\Http\Requests\_old\ArticleRequest;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\BlogCategory;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use App\Models\Warning;
use App\Services\ModelLogger;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminController extends Controller
{
//    /** @var ResponseFactory */
//    private $responseFactory;
//
//    /**
//     * @param ResponseFactory $responseFactory
//     */
//    public function __construct(ResponseFactory $responseFactory)
//    {
//        $this->responseFactory = $responseFactory;
//    }

    public function articleCreate()
    {
        $categories = BlogCategory::select('id', 'name')->get();
        $authors = User::select('id', 'name')->has('articles')->get();

        return view('admin.article.create', [
            'categories' => $categories,
            'authors' => $authors
        ]);

//        return view('admin.article.create');
    }

    public function articleEdit($articleId)
    {
        $article = Article::find($articleId);
        $categories = BlogCategory::select('id', 'name')->get();
        $authors = User::select('id', 'name')->has('articles')->get();

        return view('admin.article.edit'
            , [
                'article' => [
                    'id' => $article['id'],
                    'title' => $article['title'],
                    'description' => $article['description'],
                    'category' => $article['blog_category_id'],
                    'author' => $article['author_id'],
                    'image' => $article['image']
                ],
                'categories' => $categories,
                'authors' => $authors
            ]
        );
    }

    public function productCreate()
    {
        $categories = Category::select('id', 'name')->get();
        $warnings = Warning::select('id', 'name')->get();
//        $authors = User::select('id', 'name')->has('articles')->get();

        return view('admin.product.create', [
            'categories' => $categories,
            'warnings' => $warnings
        ]);

//        $article = Article::findOrFail($articleId);
//
//        $logger->logModel($request->user(), $article);

//        return view('admin.product.create');
    }

    public function show()
    {
//        $article = Article::findOrFail($articleId);
//
//        $logger->logModel($request->user(), $article);

        return view('admin.show');
    }

//    public function create()
//    {
//        $categories = BlogCategory::select('id', 'name')->get();
//        $authors = User::select('id', 'name')->has('articles')->get();
//
//        return view('pages.articleCreate', [
//            'categories' => $categories,
//            'authors' => $authors
//        ]);
//    }

//    public function edit($articleId)
//    {
//        $article = Article::findOrFail($articleId);
//        $categories = BlogCategory::select('id', 'name')->get();
//        $authors = User::select('id', 'name')->has('articles')->get();
//
//        return view('pages.articleEdit', [
//            'article' => [
//                'id' => $article['id'],
//                'title' => $article['title'],
//                'description' => $article['description'],
//                'category' => $article['blog_category_id'],
//                'author' => $article['author_id'],
//                'image' => $article['image']
//            ],
//            'categories' => $categories,
//            'authors' => $authors
//        ]);
//    }
}
