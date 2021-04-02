<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // 管理権限のみ許可
        Gate::define('admin-user', function ($user) {
            return ($user->roles->first()->id == 1);
        });

        // 記事担当者（または管理権限）にのみ許可
        Gate::define('article-user', function (User $user) {
            return ($user->roles->first()->id == 4 || $user->roles->first()->id == 1);
            });

        // アウトライン担当者（または管理権限）にのみ許可
        Gate::define('outline-user', function (User $user) {
            return ($user->roles->first()->id == 7 || $user->roles->first()->id == 1);
        });

        // 管理権限以外のみ許可
        Gate::define('outline-and-article-user', function (User $user) {
            return ($user->roles->first()->id < 1);
        });

        //　全ユーザーに許可
        Gate::define('all-users', function (User $user) {
            return ($user->roles->first()->id >= 0);
          });
      }
    
}
