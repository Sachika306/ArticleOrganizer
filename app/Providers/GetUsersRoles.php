<?php

namespace App\Providers;

use Illuminate\Support\Facades\{View, Storage};
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

        View::composer ('*', 'App\Http\Composers\AssignComposer'); // jqueryのオートコンプリート用に、アウトライン担当者と記事担当者の配列を渡す。
        
        View::composer ('*', function($view) {
            $roles = Role::get();
            $view -> with('roles', $roles);
            // AWSのS3のthumbnailsフォルダのパスを渡す
            $s3path = Storage::disk('s3')->path('https://articleorganizer.s3-ap-northeast-1.amazonaws.com/thumbnails/');
            $view -> with('s3path', $s3path);
        });

    }

}
