<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\BlogCategory;
use App\Models\Comment;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        $request = request()->all();
        $sort = $request['sort'] ?? 'ASC';

        $categories = BlogCategory::select('id', 'name')->get();
        $category = $request['category'] ?? $categories->first()->id;


        // with
        $articles = Article::where('blog_category_id', '=', $category)->orderby('created_at', $sort)->paginate(4);
        $articles->appends(['sort' => $sort]);
        $articles->appends(['category' => $category]);

        return view('pages.blog',
            [
                'articles' => $articles,
                'categories' => $categories,
                'filter' => [
                    'sort' => $sort,
                    'category' => (int)$category
                ]
            ]
        );
    }

    public function show($articleId)
    {
        $articleComments = Comment::orderby('created_at', 'DESC')->get()->all();
        return view('pages.article', ['articleComments' => $articleComments, 'articleId' => $articleId]);
    }
}
