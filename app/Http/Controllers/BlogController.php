<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\BlogCategory;

class BlogController extends Controller
{
    public function show($categoryId = 1) {
        $categories = BlogCategory::select('id', 'name')->withCount('article')
            ->orderBy('article_count', 'DESC')
            ->get();

        $articles = Article::where('blog_category_id', '=', $categoryId)
            ->paginate(10)->onEachSide(10);

        return view('blog.show',
            [
                'articles' => $articles,
                'categories' => $categories,
                'filter' => [
                    'category' => (int)$categoryId,
                ]
            ]
        );
    }
}
