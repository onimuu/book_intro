<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
  public function index()
  {
    $user = Auth::user();
    $items = Post::all();
    return view('posts.home', ['items' => $items, 'user' => $user]);
  }

  public function add()
  {
    $user = Auth::user();
    return view('posts.add', ['user' => $user]);
  }

  public function create(Request $request)
  {
    // $this->validate($request, Person::$rules);
    $post = new Post;
    $post->user_id = $request->user_id;
    $post->book = $request->book;
    $post->title = $request->title;
    $post->body = $request->body;
    $post->save();
    return redirect('/home');
  }

  public function show($id)
  {
    $post = Post::find($id);
    return view('posts.show', ['post' => $post]);
  }
}
