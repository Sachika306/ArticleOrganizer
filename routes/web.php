<?php

use Illuminate\Support\Facades\Route;
use App\Models\{Article, Role, RoleUser, User, OutlineAssignment, ArticleAssignment};
use Illuminate\Support\Facades\{Mail, DB};
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Http\Providers\AuthServiceProvider;
use Carbon\Carbon;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ログイン必要・管理者権限でアクセス可能
Route::middleware('auth', 'can:admin-user')->group(function () {
    // 記事周りの機能
    Route::namespace('App\Http\Controllers\Article')->group(function() {
        Route::get('/article/assign', 'ArticleController@assign');
        Route::post('/article/store', 'ArticleController@store');
        Route::post('/article/reassign/{id}', 'ArticleController@reassign');
        Route::post('/article/destroy/{id}', 'ArticleController@destroy');
        Route::post('/outline/decline/{id}', 'OutlineStatusController@decline');
        Route::post('/outline/approve/{id}', 'OutlineStatusController@approve');
        Route::post('/article/decline/{id}', 'ArticleStatusController@decline');
        Route::post('/article/approve/{id}', 'ArticleStatusController@approve');
        Route::post('/article/decline/{id}', 'ArticleStatusController@decline');
        Route::post('/article/approve/{id}', 'ArticleStatusController@approve');
        Route::post('/article/publish/{id}', 'ArticlePublishController@publish');
        Route::post('/article/withhold/{id}', 'Article\ArticlePublishController@withhold');
    });
    // メンバー周りの機能
    Route::namespace('App\Http\Controllers\Member')->group(function() {
        Route::get('/member', 'MemberController@index');
        Route::get('/member/show/{id}', 'MemberController@show');
        Route::get('/member/edit/{id}', 'MemberController@edit');
        Route::post('/member/destroy/{id}', 'MemberController@destroy');
    });
});

//Route::middleware('can:admin-user')->group(function () {
    Route::namespace('App\Http\Controllers\Auth')->group(function() {
        Route::get('/register', 'RegisterController@getRegister')->name('register');
        Route::post('/register', 'RegisterController@postRegister');
    });
//});


// ログイン必要・記事担当者権限でアクセス可能
Route::middleware('auth', 'can:article-user')->group(function () {
    Route::namespace('App\Http\Controllers\Article')->group(function () {
        Route::get('/article/edit/{id}', 'ArticleController@contentEdit');
        Route::post('/article/update/{id}', 'ArticleController@contentUpdate');
    });
    Route::namespace('App\Http\Controllers\Status')->group(function () {
        Route::post('/article/submit/{id}', 'ArticleStatusController@submit');
    });
});


// ログイン必要・アウトライン担当者権限でアクセス可能
Route::middleware('auth', 'can:outline-user')->group(function () {
    Route::namespace('App\Http\Controllers\Outline')->group(function () {
        Route::get('/outline/edit/{id}', 'OutlineController@outlineEdit');
        Route::post('/outline/update/{id}', 'OutlineController@outlineUpdate');
    });
    Route::namespace('App\Http\Controllers\Status')->group(function () {
        Route::post('/outline/submit/{id}', 'OutlineStatusController@submit');
    });
});

// ログイン必要・すべての権限でアクセス可能
Route::middleware('auth', 'can:all-users')->group(function () {
    Route::namespace('App\Http\Controllers\Article')->group(function() {
        Route::get('/article', 'ArticleController@index')->name('article');
        Route::get('/article/show/{id}', 'ArticleController@show')->name('article.show.id');
        Route::get('/article/preview/{id}', 'Article\ArticleController@preview');
        Route::get('/article/sort', 'ArticleFilterController@sort')->name('sortarticle');
    });
    Route::namespace('App\Http\Controllers\Outline')->group(function() {
        Route::get('/article/outline/{id}', 'OutlineController@preview');
    });
    Route::namespace('App\Http\Controllers\Member')->group(function() {
        Route::get('/member/setting', 'MemberController@setting')->name('setting');
        Route::post('/member/setting/update', 'MemberController@settingupdate')->name('member.setting.update');
    });
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});

//　ゲストログイン機能
Route::middleware('auth', 'can:guest-user')->group(function () {
    Route::namespace('App\Http\Controllers\Member')->group(function() {
        Route::post('/update/guest', 'MemberController@updateGuest')->name('update.guest');
    });
    Route::namespace('App\Http\Controllers\Status')->group(function() {
        Route::post('/article/submit/{id}', 'ArticleStatusController@submit');
        Route::post('/outline/submit/{id}', 'OutlineStatusController@submit');
    });
});

// ログイン不要・公開済みの記事表示用
Route::get('/aaa', function () {
    $user = User::find(1);
    echo $user->password;
});
Route::namespace('App\Http\Controllers')->group(function() {
    Route::get('/', 'PostController@index');
    Route::get('/post/{id}', 'PostController@show');
});


//　ログイン不要・ログインページ
Route::namespace('App\Http\Controllers\Auth')->group(function() {
    Route::get('/login', 'LoginController@getAuth')->name('login');
    Route::post('/login/post', 'LoginController@postAuth')->name('login.post');
    Route::get('/logout', 'LoginController@logout');
    Route::post('/login/guest', 'LoginController@loginGuest')->name('login.guest'); //ゲストログイン用
});

//　Authの設定
Auth::routes([
    'register' => false,
    'verify' => true
]);

// 認証機能
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->route('dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');
    
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');