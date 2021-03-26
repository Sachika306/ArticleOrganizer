<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\RoleUser;
use App\Models\Role;
use App\Models\User;
use App\Models\Article;
use App\Models\Status;

class GetUsersRoles extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // 
        View::composer ('member.*', function($view) {
            $roleusers = RoleUser::get();
            $roles = Role::get();
            $users = User::paginate(15);
            $view -> with('roleusers', $roleusers);
            $view -> with('roles', $roles);
            $view -> with('users', $users);
        });

        View::composer ('article.*', function($view) {
            $articles = Article::paginate(15);
            $users = User::get();
            $view -> with('articles', $articles);
            $view -> with('users', $users);
        });


    }

}
