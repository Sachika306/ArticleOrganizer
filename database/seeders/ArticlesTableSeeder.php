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
                $outlineDeadline = OutlineAssignment::where('article_id', '=', $article->id)->first()->outline_deadline; // アウトラインの納期を取得
                
                ArticleAssignment::factory()->create([
                    'article_id' => $article->id, 
                    'article_deadline' => Carbon::parse($outlineDeadline)->addWeek(2) // アウトラインの納期＋2週間の日付を記事納期にする
                    ]);

                Thumbnail::factory()->create(['article_id' => $article->id]);
                Outline::create(['article_id' => $article->id]);
            }
        );


        $statuses = array(
            1 => array(
                'title' => 'るるぶトラベルとは？ユーザー・施設へのサービスが充実、掲載方法やメリットを解説', 
                'content' => 'Some ,name', 
                ), 
            2 => array(
                'title' => '中国では個人旅行がトレンドに？中国FIT旅行者の特徴・いまできる中国へのインバウンド対策', 
                'content' => 'aaa',
                ), 
            3 => array(
                'title' => '洗肺ってなに？読み方や意味は？訪日中国人のインバウンド誘致に期待', 
                'content' => 'Some ,name', 
                ), 
            4 => array(
                'title' => '愛知県で年間10万人の観光客が来る佐久島！', 
                'content' => 'Some ,name', 
                ), 
        );

        for($id = 1; $id < 5; $id++) {
            \App\Models\Article::find($id)->update([
                'title' => $statuses[$id]['title'],
                'content' => $statuses[$id]['content'],
            ]);
        }
    }
}