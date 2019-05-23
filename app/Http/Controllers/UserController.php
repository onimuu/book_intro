<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use App\http\Requests\UsersRequest;


class UserController extends Controller
{
  public function show()
  {
    $user = Auth::user();
    $items = Post::where('user_id', $user->id)->get();
    // $items = Post::find($user->id);
    return view('user/user', ['user' => $user, 'items' => $items]);
  }

  public function edit()
  {
    $user = Auth::user();
    return view('user/edit', ['user' => $user]);
  }

  public function update(UsersRequest $request)
  {
    $user = Auth::user();
    $user->name = $request->name;
    $user->email = $request->email;
    if ($request->photo) {
      $filename = $request->file('photo')->store('public/avatar');
      $user->avatar_filename = basename($filename);
    }
    $user->save();

    return redirect('/user');
  }
}
