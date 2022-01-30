<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class LoginController extends Controller
{

  public function __construct()
  {
    $this->middleware(['guest']);
  }

  public function index()
  {
    return view('front.auth.login');
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'email' => 'required|email',
      'password' => 'required'
    ]);

    if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
      return back()->with('status', 'Invalid Login Details');
    }

    if (auth()->user()->is_admin) {
      return redirect()->route('admin.dashboard');
    }
    //elseif (auth()->user()->is_seller) {
    //  return redirect()->route('seller.dashboard');
    //}
    else {
      return redirect()->route('buyer.dashboard');
    }

  }


  public function forgot()
  {
    return view('front.auth.forgot-password');
  }

  public function forgotPost(Request $request)
  {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);

  }

  public function reset($token)
  {
    return view('front.auth.reset-password', ['token' => $token]);
  }

  public function resetPassword(Request $request)
  {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(64));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
                ? redirect()->route('signin')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
  }
}
