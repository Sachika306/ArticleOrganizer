<?php

use Illuminate\Support\Facades\Route;
use App\Models\{Article, Role, RoleUser, User, OutlineAssignment, ArticleAssignment};
use Illuminate\Support\Facades\{Mail, DB};
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Http\Providers\AuthServiceProvider;


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
    // article
    Route::get('/article/assign', 'App\Http\Controllers\ArticleController@assign');
    Route::post('/article/store', 'App\Http\Controllers\ArticleController@store');
    Route::post('/article/destroy/{id}', 'App\Http\Controllers\ArticleController@destroy');
    Route::post('/outline/decline/{id}', 'App\Http\Controllers\Status\OutlineStatusController@decline');
    Route::post('/outline/approve/{id}', 'App\Http\Controllers\Status\OutlineStatusController@approve');
    Route::post('/article/decline/{id}', 'App\Http\Controllers\Status\ArticleStatusController@decline');
    Route::post('/article/approve/{id}', 'App\Http\Controllers\Status\ArticleStatusController@approve');
    Route::post('/article/publish/{id}', 'App\Http\Controllers\ArticlePublishController@publish');
    Route::post('/article/withhold/{id}', 'App\Http\Controllers\ArticlePublishController@withhold');
    // member
    Route::get('/member', 'App\Http\Controllers\MemberController@index');
    Route::get('/member/show/{id}', 'App\Http\Controllers\MemberController@show');
    Route::get('/member/edit/{id}', 'App\Http\Controllers\MemberController@edit');
    Route::post('/member/destroy/{id}', 'App\Http\Controllers\MemberController@destroy');
});
//Route::middleware('can:admin-user')->group(function () {
    Route::get('/register', 'App\Http\Controllers\Auth\RegisterController@getRegister')
        ->name('register');
    Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@postRegister');
//});


// ログイン必要・記事担当者権限でアクセス可能
Route::middleware('auth', 'can:article-user')->group(function () {
    Route::get('/article/edit/{id}', 'App\Http\Controllers\ArticleController@contentEdit');
    Route::post('/article/update/{id}', 'App\Http\Controllers\ArticleController@contentUpdate');
    Route::post('/article/submit/{id}', 'App\Http\Controllers\Status\ArticleStatusController@submit');
});


// ログイン必要・アウトライン担当者権限でアクセス可能
Route::middleware('auth', 'can:outline-user')->group(function () {
    Route::get('/outline/edit/{id}', 'App\Http\Controllers\ArticleController@outlineEdit');
    Route::post('/outline/update/{id}', 'App\Http\Controllers\ArticleController@outlineUpdate');
    Route::post('/article/submit/{id}', 'App\Http\Controllers\Status\OutlineStatusController@submit');
});

// ログイン必要・すべての権限でアクセス可能
Route::middleware('auth', 'can:all-users')->group(function () {
    Route::get('/article', 'App\Http\Controllers\ArticleController@index')->name('article');
    Route::get('/article/show/{id}', 'App\Http\Controllers\ArticleController@show');
    Route::get('/article/preview/{id}', 'App\Http\Controllers\ArticleController@preview');
    Route::get('/article/outline/{id}', 'App\Http\Controllers\ArticleController@outline');
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
    Route::get('/member/setting', 'App\Http\Controllers\MemberController@setting');
    Route::post('/member/setting/update', 'App\Http\Controllers\MemberController@settingupdate');
    Route::get('/article/sort', 'App\Http\Controllers\ArticleFilterController@sort')->name('sortarticle');
});


// ログイン不要・公開済みの記事表示用
Route::get('/aaa', function () {
    $user = User::find(3);
    $outlineAssignment = OutlineAssignment::all();
    $articleAssignment = ArticleAssignment::all();
echo $user->roles;
});
Route::get('/', 'App\Http\Controllers\PostController@index');
Route::get('/post/{id}', 'App\Http\Controllers\PostController@show');


//　ログインページ
Route::get('/login', 'App\Http\Controllers\Auth\LoginController@getAuth')
    ->name('login');
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@postAuth');
Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout');


//　member auth
Auth::routes([
    'register' => false,
    'verify' => true
]);


// verification
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