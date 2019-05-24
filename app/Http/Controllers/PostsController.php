<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use App\http\Requests\PostsRequest;

class PostsController extends Controller
{
  public function index()
  {
    $user = Auth::user();
    $items = Post::simplePaginate(6);
    return view('posts.home', ['items' => $items, 'user' => $user]);
  }

  public function add()
  {
    $user = Auth::user();
    return view('posts.add', ['user' => $user]);
  }

  public function create(PostsRequest $request)
  {
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
    $user = Auth::user();
    $post = Post::find($id);
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
    $post->book = $request->book;
    $post->title = $request->title;
    $post->body = $request->body;
    $post->save();
    return redirect('/home');
  }

  public function delete($id)
  {
    Post::find($id)->delete();
    return redirect('/home');
  }


}
