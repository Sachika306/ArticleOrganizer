<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        DB::table('roles')->insert($param);

        $param = [
            'name' => 'アウトライン担当者'
        ];
        DB::table('roles')->insert($param);

        $param = [
            'name' => '記事担当者'
        ];
        DB::table('roles')->insert($param);
    }
}
