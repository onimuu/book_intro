<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Like;

class LikesController extends Controller
{
    public function favorite($id)
    {
      // 〜LikesMiddleware処理〜
      return redirect('/home');
    }
    public function genre_favorite($id, $genre)
    {
      // 〜LikesMiddleware処理〜
      $items = Post::where('genre', $genre)->simplePaginate(6);
      return redirect()->action('PostsController@genre_get', ['genre' => $genre]);
    }

    public function user_favorite($id)
    {
      // 〜LikesMiddleware処理〜
      return redirect('/user');
    }

    public function show_favorite($id)
    {
      // 〜LikesMiddleware処理〜
      return redirect('/posts/' . $id);
    }

}
