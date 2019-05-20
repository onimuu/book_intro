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

// ホーム画面表示
Route::get('/home', function() {
  return view('home');
});

// 会員登録
Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('auth/register', 'Auth\RegisterController@register');

// ログイン
Route::get('auth/login', 'Auth\LoginController@showLoginForm');
Route::post('auth/login', 'Auth\LoginController@login');

// ログアウト
Route::get('auth/logout', 'Auth\LoginController@logout');
