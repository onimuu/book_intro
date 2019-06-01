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
      $user = Auth::User();
      $item = Post::find($id);
      if (count(Like::where('user_id', $user->id)->where('post_id', $item->id)->get())) {
        // 星削除
        $item->favorite -= 1;
        Like::where('user_id', $user->id)->where('post_id', $item->id)->delete();
      } else {
        // 星追加
        $item->favorite += 1;
        $like = new Like;
        $like->user_id = $user->id;
        $like->post_id = $item->id;
        $like->save();
      }
      $item->save();
      return redirect('/home');
    }
    public function genre_favorite($id, $genre)
    {
      $user = Auth::user();
      $item = Post::find($id);
      if (count(Like::where('user_id', $user->id)->where('post_id', $item->id)->get())) {
        // 星削除
        $item->favorite -= 1;
        Like::where('user_id', $user->id)->where('post_id', $item->id)->delete();
      } else {
        // 星追加
        $item->favorite += 1;
        $like = new Like;
        $like->user_id = $user->id;
        $like->post_id = $item->id;
        $like->save();
      }
      $item->save();
      $items = Post::where('genre', $genre)->simplePaginate(6);
      // $item_genre = $genre;
      return redirect()->action('PostsController@genre_get', ['genre' => $genre]);
      // return view('posts.genre', ['items' => $items, 'user' => $user, 'item_genre' => $item_genre]);
    }

    public function user_favorite($id)
    {
      $user = Auth::user();
      $item = Post::find($id);
      if (count(Like::where('user_id', $user->id)->where('post_id', $item->id)->get())) {
        // 星削除
        $item->favorite -= 1;
        Like::where('user_id', $user->id)->where('post_id', $item->id)->delete();
      } else {
        // 星追加
        $item->favorite += 1;
        $like = new Like;
        $like->user_id = $user->id;
        $like->post_id = $item->id;
        $like->save();
      }
      $item->save();
      return redirect('/user');
    }

    public function show_favorite($id)
    {
      $user = Auth::user();
      $item = Post::find($id);
      if (count(Like::where('user_id', $user->id)->where('post_id', $item->id)->get())) {
        // 星削除
        $item->favorite -= 1;
        Like::where('user_id', $user->id)->where('post_id', $item->id)->delete();
      } else {
        // 星追加
        $item->favorite += 1;
        $like = new Like;
        $like->user_id = $user->id;
        $like->post_id = $item->id;
        $like->save();
      }
      $item->save();
      return redirect('/posts/' . $id);
    }

}
