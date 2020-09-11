<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class LoginController extends Controller
{
    public function login(Request $request, MessageBag $bag)
    {
        $validatedData = $request->validate([
           'email'      => 'required',
           'password'   => 'required'
        ]);

        $user           = new User();
        $identifiedUser = $user->getOne($validatedData['email']);

        if ($identifiedUser) {
            if (password_verify($validatedData['password'], $identifiedUser->password)) {
                return view('home', ['name' => $identifiedUser->name]);
            } else {
                $bag->add('passwordNoMatch', 'The password provided is incorrect');

                return redirect('/')->withErrors($bag);
            }
        } else {
            $bag->add('userNotFound', 'The email provided is not registered');

            return redirect('/')->withErrors($bag);
        }
    }
}
