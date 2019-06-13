<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Like;
use App\Preserve;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostsRequest;

class PostsController extends Controller
{
  public function index()
  {
    $user = Auth::user();
    $posts = Post::simplePaginate(6);
    foreach ($posts as $post) {
      if (count(Like::where('user_id', $user->id)->where('post_id', $post->id)->get())) {
        $post->favorite_user_identify = 1;
      } else {
        $post->favorite_user_identify = 0;
      }
    }
    return view('posts.home', ['posts' => $posts, 'user' => $user]);
  }

  public function add()
  {
    $user = Auth::user();
    if (Preserve::where('user_id', $user->id)->get()) {
      $preserves = Preserve::where('user_id', $user->id)->get();
    }
    return view('posts.add', ['user' => $user, 'preserves' => $preserves]);
  }

  public function create(PostsRequest $request)
  {
    $post = new Post;
    $post->user_id = $request->user_id;
    $post->title = $request->title;
    $post->book = $request->book;
    $post->author = $request->author;
    $post->genre = $request->genre;
    $post->body = $request->body;
    $post->save();
    return redirect('/home');
  }

  public function show($id)
  {
    $user = Auth::user();
    $post = Post::find($id);
    if (count(Like::where('user_id', $user->id)->where('post_id', $post->id)->get())) {
      $post->favorite_user_identify = 1;
    } else {
      $post->favorite_user_identify = 0;
    }
    return view('posts.show', ['post' => $post, 'user' => $user]);
  }

  public function edit($id)
  {
    $user = Auth::user();
    $post = Post::find($id);
    return view('posts.edit', ['post' => $post, 'user' => $user]);
  }

  public function update(PostsRequest $request)
  {
    $post = Post::find($request->id);
    $post->user_id = $request->user_id;
    $post->title = $request->title;
    $post->book = $request->book;
    $post->author = $request->author;
    $post->genre = $request->genre;
    $post->body = $request->body;
    $post->save();
    return redirect('/home');
  }

  public function delete($id)
  {
    Post::find($id)->delete();
    return redirect('/home');
  }

  public function genre_get($genre)
  {
    $user = Auth::user();
    $posts = Post::where('genre', $genre)->simplePaginate(6);
    foreach ($posts as $post) {
      if (count(Like::where('user_id', $user->id)->where('post_id', $post->id)->get())) {
        $post->favorite_user_identify = 1;
      } else {
        $post->favorite_user_identify = 0;
      }
    }
    $post_genre = $genre;
    return view('posts.genre', ['posts' => $posts, 'user' => $user, 'post_genre' => $post_genre]);
  }

  public function genre_post(Request $request)
  {
    $user = Auth::user();
    $posts = Post::where('genre', $request->genre)->simplePaginate(6);
    foreach ($posts as $post) {
      if (count(Like::where('user_id', $user->id)->where('post_id', $post->id)->get())) {
        $post->favorite_user_identify = 1;
      } else {
        $post->favorite_user_identify = 0;
      }
    }
    $post_genre = $request->genre;
    return view('posts.genre', ['posts' => $posts, 'user' => $user, 'post_genre' => $post_genre]);
  }
}
