<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show()
    {
        $products = Product::select('products.id', 'products.name', 'products.price', 'products_info.image_location')
            ->join('products_info', 'products_info.product_id', '=', 'products.id')
            ->where('products.flag', '1')
            ->where('products.category_id', '1')
            ->orderby('name', 'ASC')
            ->limit(6)
            ->get();

        $topFiveCommentedArticles= Article::withCount('comments')
            ->orderBy('comments_count', 'DESC')
            ->orderBy('published_at', 'DESC')
            ->limit(5)
            ->get();

        return view('home.show', [
            'products' => $products,
            'topFiveCommentedArticles' => $topFiveCommentedArticles
        ]);
    }
}
