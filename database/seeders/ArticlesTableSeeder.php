<?php

namespace Database\Seeders;

use App\Models\{ArticleAssignment, OutlineAssignment, Thumbnail, Outline};
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
                OutlineAssignment::factory()->create(['article_id' => $article->id]);
                // アウトラインの納期を取得
                $outlineDeadline = OutlineAssignment::where('article_id', '=', $article->id)->first()->outline_deadline;
                
                ArticleAssignment::factory()->create([
                    'article_id' => $article->id, 
                    'article_deadline' => Carbon::parse($outlineDeadline)->addWeek(2) // アウトラインの納期＋2週間の日付を記事納期にする
                    ]);
                Thumbnail::factory()->create(['article_id' => $article->id]);
                Outline::create(['article_id' => $article->id]);
            }
        );
    }
}