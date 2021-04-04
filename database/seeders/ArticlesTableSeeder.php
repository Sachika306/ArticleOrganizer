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
       \App\Models\Article::factory()->count(20)->create()->each(
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

        // 記事用の固定ダミーデーターをJSONから取得
        $url = public_path().'/data/dummyArticleData.json';
        $json = file_get_contents($url);
        $data = json_decode($json);
        foreach ($data as $obj) {

            // 記事に固定のコンテンツを挿入
            \App\Models\Article::find($obj->id)->update([
                'title' => $obj->title,
                'content' => $obj->content,
                'status_id' => $obj->status_id,
                'publish_flg' => $obj->publish_flg,
            ]);
            // サムネイルのfile_nameに固定値を挿入
            \App\Models\Thumbnail::where('article_id', '=', $obj->id)->update([
                'file_name' => $obj->file_name,
            ]);
            // アウトラインに固定値を挿入
            $totalChars = $obj->lead_chars + $obj->part1_chars + $obj->part2_chars + $obj->part3_chars;
            \App\Models\Outline::where('article_id', '=', $obj->id)->update([
                'lead_kw' => $obj->lead_kw,
                'lead_chars' => $obj->lead_chars,
                'persona' => $obj->persona,
                'part1_title' => $obj->part1_title,
                'part1_summary' => $obj->part1_summary,
                'part1_chars' => $obj->part1_chars,
                'part2_title' => $obj->part2_title,
                'part2_summary' => $obj->part2_summary,
                'part2_chars' => $obj->part2_chars,
                'part3_title' => $obj->part3_title,
                'part3_summary' => $obj->part3_summary,
                'part3_chars' => $obj->part3_chars,
                'conclusion_title' => $obj->conclusion_title,
                'conclusion_chars' => $obj->conclusion_chars,
                'conclusion' => $obj->conclusion,
                'total_chars' => $totalChars
            ]);
        }
        
    }
}