<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\BlogCategory;
use App\Models\Category;
use App\Models\User;
use App\Models\Warning;

class AdminController extends Controller
{
    public function articleCreate()
    {
        $categories = BlogCategory::select('id', 'name')->get();
        $authors = User::select('id', 'name')->get();

        return view('admin.article.create', [
            'categories' => $categories,
            'authors' => $authors
        ]);
    }

    public function articleEdit($articleId)
    {
        $article = Article::find($articleId);
        $categories = BlogCategory::select('id', 'name')->get();
        $authors = User::select('id', 'name')->get();

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

        return view('admin.product.create', [
            'categories' => $categories,
            'warnings' => $warnings
        ]);
    }

//    public function productEdit(){}
}
