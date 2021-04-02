<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //　ゲストユーザー用アカウント
        $param = [
            'name' => '山田 大郎',
            'first_name' => '大郎',
            'last_name' => '山田',
            'email' => 'guest@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('guestpass'),
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
        DB::table('users')->insert($param);
    }
}
