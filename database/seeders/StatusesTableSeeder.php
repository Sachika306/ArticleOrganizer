<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '未着手'
        ];
        DB::table('statuses')->insert($param);

        $param = [
            'name' => 'アウトライン作成中'
        ];
        DB::table('statuses')->insert($param);

        $param = [
            'name' => 'アウトライン修正中'
        ];
        DB::table('statuses')->insert($param);

        $param = [
            'name' => 'アウトライン確認中'
        ];
        DB::table('statuses')->insert($param);

        $param = [
            'name' => '記事作成中'
        ];
        DB::table('statuses')->insert($param);

        $param = [
            'name' => '記事修正中'
        ];
        DB::table('statuses')->insert($param);

        $param = [
            'name' => '記事確認中'
        ];
        DB::table('statuses')->insert($param);

        $param = [
            'name' => '公開待ち'
        ];
        DB::table('statuses')->insert($param);

        $param = [
            'name' => '公開済み'
        ];
        DB::table('statuses')->insert($param);
    }
}
