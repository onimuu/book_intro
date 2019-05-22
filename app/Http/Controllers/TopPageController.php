<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopPageController extends Controller
{
  public function top()
  {
    if (Auth::check()) {
      return redirect('/home');
    } else {
      return view('top.top');
    }
  }
}
