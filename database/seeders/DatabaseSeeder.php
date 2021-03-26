<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class); //済
        $this->call(StatusesTableSeeder::class); //済
        $this->call(RoleUsersTableSeeder::class); 
        $this->call(ArticlesTableSeeder::class); //済
        $this->call(ArticleAssignmentsTableSeeder::class);
        $this->call(OutlineAssignmentsTableSeeder::class);
    }
}
