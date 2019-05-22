<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;


class UserController extends Controller
{
  public function show()
  {
    $user = Auth::user();
    $items = Post::where('user_id', $user->id)->get();
    // $items = Post::find($user->id);
    return view('user/user', ['user' => $user, 'items' => $items]);
  }
}
