<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Like;

class LikesController extends Controller
{
    public function favorite()
    {
      $id = $_POST['id'];
      $user = Auth::User();
      $post = Post::find($id);
      if (count(Like::where('user_id', $user->id)->where('post_id', $post->id)->get())) {
        // 星削除
        $post->favorite -= 1;
        Like::where('user_id', $user->id)->where('post_id', $post->id)->delete();
        $post->favorite_user_identify = 0;
      } else {
        // 星追加
        $post->favorite += 1;
        $post->favorite_user_identify = 1;
        $like = new Like;
        $like->user_id = $user->id;
        $like->post_id = $post->id;
        $like->save();
      }
      $post->save();

      return response()->json(
        [
          'count' => $post->favorite,
          'identify' => $post->favorite_user_identify,
        ]
      );
    }
}
