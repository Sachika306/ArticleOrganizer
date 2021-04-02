<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RoleUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\RoleUser::factory()->count(10)->create(); 

        //　ゲストユーザー用権限
        $id = \App\Models\User::orderBy('id', 'DESC')->get()->first()->id;
        $param = [
            'user_id' => $id+1,
            'role_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
        DB::table('role_users')->insert($param);
    }
}
