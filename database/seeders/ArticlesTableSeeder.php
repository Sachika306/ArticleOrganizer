<?php

namespace Database\Seeders;

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
        //
        $param = [
            'title' => 'menu（メニュー）で口コミが集められる！登録方法や配達可能エリアも紹介',
            'status_id' => 3
        ];
        DB::table('articles')->insert($param);

        $param = [
            'title' => 'SNSマーケティングのポイントとは｜UGCを促しユーザーと接点をもつコツ・事例',
            'status_id' => 7
        ];
        DB::table('articles')->insert($param);

        $param = [
            'title' => 'EFO（Entry Form Optimization：エントリフォームの最適化）とは？意味やメリット、離脱削減に向けて気をつけたいポイント紹介',
            'status_id' => 5
        ];
        DB::table('articles')->insert($param);

        $param = [
            'title' => 'リベンジ消費とは／中国ではすでに消費拡大！インバウンド対策もアフターコロナに向けて始動 ',
            'status_id' => 1
        ];
        DB::table('articles')->insert($param);

        $param = [
            'title' => 'AISASモデルとは | 消費者の購買活動を喚起するネット広告の認知プロセス',
            'status_id' => 9
        ];
        DB::table('articles')->insert($param);

    }
}