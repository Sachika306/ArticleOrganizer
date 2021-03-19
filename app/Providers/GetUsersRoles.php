<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Models\Roleuser;
use App\Models\Article;

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
            $roles = Roleuser::get();
            $users = User::paginate(15);
            $view -> with('roles', $roles);
            $view -> with('users', $users);
        });

        View::composer ('article.*', function($view) {
            $articles = Article::paginate(15);
            $view -> with('articles', $articles);
        });

    }

}
