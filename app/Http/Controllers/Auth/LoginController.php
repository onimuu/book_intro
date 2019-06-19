<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function socialLogin()
    {
      return Socialite::driver('twitter')->redirect();
    }

    public function handleProviderCallback()
    {
      $userSocial = Socialite::driver('twitter')->user();
      $user = User::where(['email' => $userSocial->getEmail()])->first();

      if ($user) {
        Auth::login($user);
        return redirect('/home');
      } else {
        $newuser = new User;
        $newuser->name = $userSocial->getName();
        $newuser->email = $userSocial->getEmail();
        $newuser->save();

        Auth::login($newuser);
        return redirect('/home');
      }
    }

    public function testLogin()
    {
      $test_user = User::where(['email' => 'test@gmail.com'])->first();
      Auth::login($test_user);
      return redirect('/home'); 
    }

}
