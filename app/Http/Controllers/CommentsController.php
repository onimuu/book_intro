<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Http\Requests\CommentsRequest;

class CommentsController extends Controller
{
    public function store(CommentsRequest $request, $id)
    {
      $comment = new Comment;
      $comment->body = $request->comment;
      $comment->post_id = $id;
      $comment->user_id = $request->user_id;
      $comment->save();
      return redirect('/posts/' . $id);
    }
}
