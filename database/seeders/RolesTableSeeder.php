<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Roles;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '管理者'
        ];

        $param = [
            'name' => 'アウトライン担当者'
        ];

        $param = [
            'name' => '記事担当者'
        ];

        DB::table('statuses')->insert($param);
    }
}
