<?php

namespace App\Http\Controllers;

use App\Models\Category;

class MenuController extends Controller
{
    public function show() {
        $categories = Category::has('products')
        ->with(['products' => function ($query) {
            $query->with(['productInfo'])
                ->with(['warnings'])
                ->where('flag', '=' , '1')
            ;
        }])
            ->get();


        return view('menu.show', [
            'categories' => $categories->toArray()
        ]);
    }
}
