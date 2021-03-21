<?php

use Illuminate\Support\Facades\Route;
use App\Models\Article;
use App\Models\RoleUser;
use App\Models\User;
use App\Models\OutlineAssignment;
use App\Models\ArticleAssignment;

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
Route::get('/', function() { 

});

Route::get('/article', 'App\Http\Controllers\ArticleController@index')
    ->middleware('auth');

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

Route::post('/member/destroy/{id}', 'App\Http\Controllers\MemberController@destroy')
    ->middleware('auth');


//　会員登録 //
Auth::routes([
    'register' => false // ユーザ登録機能をオフに切替
]);

Route::get('/register', 'App\Http\Controllers\Auth\RegisterController@getRegister')
    ->name('register');
   // ->middleware('auth');

Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@postRegister');


//　ログイン //
Route::get('/login', 'App\Http\Controllers\Auth\LoginController@getAuth');
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@postAuth');

Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout');
