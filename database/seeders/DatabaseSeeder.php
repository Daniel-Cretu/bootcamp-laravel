<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use App\Models\Comment;
use App\Models\Product;
use App\Models\ProductInfo;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        Article::factory()
//            ->count(10)
//            ->has(BlogTag::factory(), 'blogTags');
//
//        Comment::factory()->count(20)->create();
//        BlogCategory::factory()->count(3)->create();
//        Product::factory()->count(5)->create();
        ProductInfo::factory()->count(5)->create();
    }
}
