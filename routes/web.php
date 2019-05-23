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

// トップページ表示
Route::get('/', 'TopPageController@top');

// 会員登録
Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('auth/register', 'Auth\RegisterController@register');

// ログイン
Route::get('auth/login', 'Auth\LoginController@showLoginForm');
Route::post('auth/login', 'Auth\LoginController@login');

// ログアウト
Route::get('auth/logout', 'Auth\LoginController@logout');

// 投稿一覧
Route::get('/home', 'PostsController@index');
  // -<middleware('auth');

// 投稿詳細
Route::get('/posts/{id}', 'PostsController@show')->where('id', '[0-9]+');

// 新規作成
Route::get('/posts/add', 'PostsController@add');
Route::post('/posts/add', 'PostsController@create');

// 投稿編集
Route::get('/posts/{id}/edit', 'PostsController@edit')->where('id', '[0-9]+');
Route::post('/posts/edit', 'PostsController@update');

// 投稿削除
Route::get('/posts/{id}/del', 'PostsController@delete')->where('id', '[0-9]+');

// マイページ
Route::get('/user', 'UserController@show');

// 登録情報変更
Route::get('/user/edit', 'UserController@edit');
Route::post('/user/edit', 'UserController@update');

// プロフィール画像アップロード
// Route::post('/upload', 'UserController@upload');
