<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

class LoginController extends Controller
{
    public function authenticate(Request $request, MessageBag $bag)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('user.home', [auth()->user()]);
        } else {
            return back()->withErrors($bag->add('authFailed', 'Authentication failed, please try again.'));
        }
    }
}
