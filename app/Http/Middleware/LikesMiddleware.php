<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Like;

class LikesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      $id = $request->route()->parameter('id');
      $user = Auth::User();
      $post = Post::find($id);
      if (count(Like::where('user_id', $user->id)->where('post_id', $post->id)->get())) {
        // 星削除
        $post->favorite -= 1;
        Like::where('user_id', $user->id)->where('post_id', $post->id)->delete();
      } else {
        // 星追加
        $post->favorite += 1;
        $like = new Like;
        $like->user_id = $user->id;
        $like->post_id = $post->id;
        $like->save();
      }
      $post->save();

      return $next($request);
    }
}
