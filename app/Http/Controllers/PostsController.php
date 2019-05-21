<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
  public function index()
  {
    $items = Post::all();
    return view('posts.home', ['items' => $items]);
  }

  public function add()
  {
    return view('posts.add');
  }

  public function create(Request $request)
  {
    // $this->validate($request, Person::$rules);
    $post = new Post;
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
