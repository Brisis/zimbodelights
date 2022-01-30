<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function __construct()
   {
     // $this->middleware(['guest']);
   }

    public function index()
    {
        return view('front.auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'name' => 'required|max:255',
        'email' => 'required|email|max:255',
        'password' => 'required|confirmed'
      ]);

      $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password)
      ]);

      if (!auth()->attempt($request->only('email', 'password'))) {
        return back()->with('status', 'Invalid Login Details');
      }

      event(new Registered($user));
      return redirect()->route('verification.notice');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //Email Verification

    public function verify()
    {
      return view('front.auth.verify-email');
    }

    public function verification(EmailVerificationRequest $request)
    {
      $request->fulfill();

      return redirect()->route('buyer.dashboard');
    }


    public function resend(Request $request)
    {
      $request->user()->sendEmailVerificationNotification();

      return back()->with('message', 'Verification link sent!');
    }

}
