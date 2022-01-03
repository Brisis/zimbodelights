<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
