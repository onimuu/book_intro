<?php

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

use App\Http\Middleware\LikesMiddleware;

// トップページ表示
Route::get('/', 'TopPageController@top');

// 会員登録
Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('auth/register', 'Auth\RegisterController@register');

// ログイン
Route::get('auth/login', 'Auth\LoginController@showLoginForm');
Route::post('auth/login', 'Auth\LoginController@login');

// ログアウト
Route::get('auth/logout', 'Auth\LoginController@logout')
->middleware('auth');

// 投稿一覧
Route::get('/home', 'PostsController@index')
->middleware('auth');

// 投稿詳細
Route::get('/posts/{id}', 'PostsController@show')->where('id', '[0-9]+')
->middleware('auth');

// 新規作成
Route::get('/posts/add', 'PostsController@add')
->middleware('auth');
Route::post('/posts/add', 'PostsController@create')
->middleware('auth');

// 投稿編集
Route::get('/posts/{id}/edit', 'PostsController@edit')->where('id', '[0-9]+')
->middleware('auth');
Route::post('/posts/edit', 'PostsController@update')
->middleware('auth');

// 投稿削除
Route::get('/posts/{id}/del', 'PostsController@delete')->where('id', '[0-9]+')
->middleware('auth');

// マイページ
Route::get('/user/{id}', 'UserController@show')->where('id', '[0-9]+')
->middleware('auth');

// 登録情報変更
Route::get('/user/edit', 'UserController@edit')
->middleware('auth');
Route::post('/user/edit', 'UserController@update')
->middleware('auth');

// ジャンル別表示
Route::get('/home/{genre}', 'PostsController@genre_get')
->middleware('auth');
Route::post('/home/genre', 'PostsController@genre_post')
->middleware('auth');

// いいね機能
Route::post('/posts/favorite', 'LikesController@favorite')
->middleware('auth');

// コメント機能
Route::post('/posts/{id}/comment', 'CommentsController@store')
->middleware('auth');

// 下書き保存機能
Route::post('/posts/preserve', 'PreserveController@store')
->middleware('auth');

// 下書き使用
Route::get('/posts/preserve/use', 'PreserveController@use')
->middleware('auth');

// 下書き削除
Route::post('/posts/preserve/delete', 'PreserveController@delete')
->middleware('auth');

// ソーシャルログイン
Route::get('/login/twitter', 'Auth\LoginController@socialLogin');
Route::get('/login/twitter/callback', 'Auth\LoginController@handleProviderCallback');

Auth::routes();
