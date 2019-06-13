<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Preserve;

class PreserveController extends Controller
{
  public function store(Request $request) {
    if (isset($request->title) || isset($request->book) || isset($request->author) || isset($request->genre) || isset($request->body)) {
      $post = new Preserve;
      $post->user_id = $request->user_id;
      $post->title = $request->title;
      if (!isset($request->title)) {
        $post->title = 'no title';
      }
      $post->book = $request->book;
      $post->author = $request->author;
      $post->genre = $request->genre;
      $post->body = $request->body;
      $post->save();
    }
    return redirect('/home');
  }

  public function delete() {
    $user = Auth::User();
    $id = $_POST['id'];
    Preserve::find($id)->delete();
    $count = count(Preserve::where('user_id', $user->id)->get());
    return response()->json([
      'count' => $count
    ]);
  }

  public function use() {
    $user = Auth::User();
    $id = $_GET['id'];
    $preserve = Preserve::find($id);
    $title = $preserve->title;
    $book = $preserve->book;
    $author = $preserve->author;
    $genre = $preserve->genre;
    $body = $preserve->body;
    $preserve->delete();
    $count = count(Preserve::where('user_id', $user->id)->get());
    return response()->json([
      'title' => $title,
      'book' => $book,
      'author' => $author,
      'genre' => $genre,
      'body' => $body,
      'count' => $count
    ]);
  }
}
