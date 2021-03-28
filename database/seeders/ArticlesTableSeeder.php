<?php

namespace Database\Seeders;

use App\Models\{ArticleAssignment, OutlineAssignment, Thumbnail, Outline};
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       \App\Models\Article::factory()->count(10)->create()->each(
            function($article) {
                ArticleAssignment::factory()->create(['article_id' => $article->id]);
                OutlineAssignment::factory()->create(['article_id' => $article->id]);
                Thumbnail::factory()->create(['article_id' => $article->id]);
                Outline::create(['article_id' => $article->id]);
            }
        );
    }
}