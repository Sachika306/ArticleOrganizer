<?php

use Illuminate\Support\Facades\Route;
use App\Models\Article;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use App\Models\OutlineAssignment;
use App\Models\ArticleAssignment;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;


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

// article routes //
Route::get('/home', 'App\Http\Controllers\HomeController@index')
    ->name('home');

Route::get('/', function() {
    echo Roleuser::where('role_id', '=', '2')->pluck('user_id')->random();
});

Route::get('/article', 'App\Http\Controllers\ArticleController@index')
    ->middleware('auth')
    ->name('article');

Route::get('/article/show/{id}', 'App\Http\Controllers\ArticleController@show')
    ->middleware('auth');

Route::get('/article/create', 'App\Http\Controllers\ArticleController@create')
    ->middleware('auth');

Route::post('/article/store', 'App\Http\Controllers\ArticleController@store')
    ->middleware('auth');

Route::post('/article/destroy/{id}', 'App\Http\Controllers\ArticleController@destroy')
    ->middleware('auth');


// member routes //
Route::get('/member', 'App\Http\Controllers\MemberController@index')
    ->middleware('auth');

Route::get('/member/show/{id}', 'App\Http\Controllers\MemberController@show')
    ->middleware('auth');

Route::get('/member/edit/{id}', 'App\Http\Controllers\MemberController@edit')
    ->middleware('auth');

Route::get('/member/setting', 'App\Http\Controllers\MemberController@setting')
    ->middleware('auth');

Route::post('/member/destroy/{id}', 'App\Http\Controllers\MemberController@destroy')
    ->middleware('auth');


//　会員登録 //
Auth::routes([
    'register' => false, // ユーザ登録機能をオフに切替
    'verify' => true
]);

Route::get('/register', 'App\Http\Controllers\Auth\RegisterController@getRegister')
    ->name('register');
   // ->middleware('auth');

Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@postRegister');


//　ログイン //
Route::get('/login', 'App\Http\Controllers\Auth\LoginController@getAuth')
    ->name('login');
    
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@postAuth');

Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout');


// verification
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->route('home');
})->middleware(['auth', 'signed'])->name('verification.verify');
    
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');