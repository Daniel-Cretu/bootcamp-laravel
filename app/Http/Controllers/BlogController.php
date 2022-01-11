<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\BlogCategory;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        $request = request()->all();
        $hasComments = $request['hasComments'] ?? 0;
        $sort = $request['sort'] ?? 'ASC';


//        $hasAuthor = false;
//        if((bool)$request['author'] !== null){
//            $author = $request['author'];
//            $hasAuthor = true;
//        }

        $categories = BlogCategory::select('id', 'name')->get();
        $authors = User::select('id', 'name')->has('articles')->get();
        $category = $request['category'] ?? $categories->first()->id;
        $author = $request['author'] ?? $authors->first()->id;


        // with
        $articles = Article::where('blog_category_id', '=', $category)
            ->orderBy('created_at', $sort)
            ->when($hasComments, function ($query)  {return $query->has('comments');})
            ->when($author, function ($query) use ($author)  {return $query->where('author_id', '=', $author);})
            ->paginate(1)->onEachSide(1);
        $articles->appends(['sort' => $sort]);
        $articles->appends(['category' => $category]);
        $articles->appends(['author' => $author]);
        $articles->appends(['hasComments' => $hasComments]);

        return view('pages.blog',
            [
                'articles' => $articles,
                'categories' => $categories,
                'authors' => $authors,
                'filter' => [
                    'sort' => $sort,
                    'category' => (int)$category,
                    'hasComments' => (int)$hasComments,
//                    'hasAuthor' => (bool)$hasAuthor,
                    'author' => (int)$author
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
