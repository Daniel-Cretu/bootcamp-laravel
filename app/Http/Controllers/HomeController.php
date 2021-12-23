<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {

        // Articles with title, category name, and others(using on main page) for this month
        $articles = Article::select(['articles.id', 'articles.title', 'articles.published_at', 'articles.image', 'articles.excerpt', 'blog_categories.name'])
            ->where('articles.published_at', '>=', Carbon::today()->startOfMonth())
            ->where('articles.published_at', '<=', Carbon::today()->endOfMonth())
            ->join('blog_categories', 'blog_categories.id', '=', 'articles.blog_category_id')
            ->orderby('articles.published_at', 'DESC')
            ->orderby('articles.title', 'ASC')
            ->get();

        // Articles without tags
        $articlesWithoutTags = Article::select(['id', 'title', 'published_at', 'image', 'excerpt'])
            ->doesntHave('blogTags')
            ->orderby('published_at', 'DESC')
            ->orderby('title', 'ASC')
            ->get();

        // Optional:
        // 1. Get articles count grouped by month from last year
        $countArticlesByMonth = Article::select([DB::raw('COUNT(*) as articles_per_month'), DB::raw('DATE_FORMAT(published_at, "%M") as month')])
            ->where('articles.published_at', '>=', Carbon::today()->startOfYear()->subYears(2))
            ->where('articles.published_at', '<=', Carbon::today()->endOfYear()->subYears(1))
            ->groupBy('month')
            ->orderby('month', 'ASC')
            ->get();

        // 2. Get article name, image and tag name
        $articleNamesImageTags = Article::select(['articles.id', 'articles.title', 'articles.image', DB::raw('group_concat(blog_tags.name) as tags')])
            ->join('article_blog_tag', 'article_blog_tag.article_id', '=', 'articles.id')
            ->join('blog_tags', 'blog_tags.id', '=', 'article_blog_tag.blog_tag_id')
            ->groupBy('articles.id', 'articles.title', 'articles.image')
            ->get();

        // 3. Get articles of author registered in last month
        $articleByAuthorsRegisteredLastMonth = Article::select(['articles.id', 'articles.title', 'articles.image', 'articles.excerpt', 'users.email_verified_at'])
            ->join('users', 'users.id', '=', 'articles.author_id')
            ->where('users.email_verified_at', '>=', Carbon::today()->subMonth()->startOfMonth())
            ->where('users.email_verified_at', '<=', Carbon::today()->subMonth()->endOfMonth())
            ->get();

        // 4. Articles without comments
        $articlesWithoutComments = Article::select(['id', 'title', 'published_at', 'image', 'excerpt'])
            ->doesntHave('comments')
            ->orderby('published_at', 'DESC')
            ->orderby('title', 'ASC')
            ->get();

        // 5. Get most five commented articles
        $articlesTop5ByComments = Article::select(['articles.id', 'articles.title', 'articles.image', 'articles.excerpt', DB::raw('COUNT(articles.id) AS nr_of_comments')])
            ->join('comments', 'comments.article_id', '=', 'articles.id')
            ->groupBy('articles.id', 'articles.title', 'articles.image', 'articles.excerpt')
            ->orderby('nr_of_comments', 'DESC')
            ->orderby('articles.published_at', 'DESC')
            ->orderby('articles.title', 'ASC')
            ->limit(5)
            ->get();

        // 6. Get articles about COVID
        $articlesTop5ByComments = Article::select(['id', 'title', 'image', 'excerpt'])
            ->whereRaw('LOWER(title) LIKE "%covid%"')
            ->orWhereRaw('LOWER(excerpt) LIKE "%covid%"')
            ->orWhereRaw('LOWER(description) LIKE "%covid%"')
            ->orderby('published_at', 'DESC')
            ->orderby('title', 'ASC')
            ->get();

        // 7. Get author with the most articles
        $authorWithMostArticles = Article::select(['users.name', DB::raw('COUNT(*) as author_articles')])
            ->join('users', 'users.id', '=', 'articles.author_id')
            ->groupBy('articles.author_id', 'users.name')
            ->orderby('author_articles', 'DESC')
            ->limit(1)
            ->get();


        $products = Product::orderby('name')->limit(4)->get()->all();
        return view('pages.home', ['articles' => $articles, 'products' => $products]);
    }
}
