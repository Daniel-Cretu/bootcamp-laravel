<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\BlogCategory;

class BlogController extends Controller
{
    public function show($categoryId = null) {
        $categories = BlogCategory::select('id', 'name')->withCount('article')
            ->orderBy('article_count', 'DESC')
            ->get();

        $category = $categoryId ?? $categories->first()->id;

        $articles = Article::where('blog_category_id', '=', $category)
            ->with(['blogTags'])
            ->paginate(10)->onEachSide(10);

        $topFiveCommentedArticles= Article::withCount('comments')
            ->orderBy('comments_count', 'DESC')
            ->orderBy('published_at', 'DESC')
            ->limit(5)
            ->get();

        return view('blog.show',
            [
                'articles' => $articles,
                'categories' => $categories,
                'topFiveCommentedArticles' => $topFiveCommentedArticles,
                'filter' => [
                    'category' => (int)$category,
                ]
            ]
        );
    }
}
