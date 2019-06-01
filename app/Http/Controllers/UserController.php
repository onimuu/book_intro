<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use App\Like;
use App\Http\Requests\UsersRequest;


class UserController extends Controller
{
  public function show()
  {
    $user = Auth::user();
    $items = Post::where('user_id', $user->id)->simplePaginate(6);
    foreach ($items as $item) {
      if (count(Like::where('user_id', $user->id)->where('post_id', $item->id)->get())) {
        $item->favorite_user_identify = 1;
      } else {
        $item->favorite_user_identify = 0;
      }
    }
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
      $user->image = base64_encode(file_get_contents($request->photo->getRealPath()));
    }
    // if ($request->photo) {
    //   $filename = $request->file('photo')->store('public/avatar');
    //   $user->avatar_filename = basename($filename);
    // }
    $user->save();

    return redirect('/user');
  }
}
