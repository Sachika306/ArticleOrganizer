<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = ([
            '未着手',
            'アウトライン作成中',
            'アウトライン修正中',
            'アウトライン確認中',
            '記事作成中',
            '記事修正中',
            '記事確認中',
            '納品完了'
        ]);

        foreach($statuses as $status) {
            DB::table('statuses')->insert([
                'name' => $status,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
