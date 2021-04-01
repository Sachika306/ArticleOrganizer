<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\{RoleUser, Role, User, Article, Status};

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
            $users = User::get();
            $view -> with('users', $users);
        });

        View::composer ('article.index', function($view) {
            $statuses = Status::get();
            $view -> with('statuses', $statuses);
        });

    }

}
