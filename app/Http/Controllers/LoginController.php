<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function login(Request $request): View
    {
        $authenticated = false;
        $user = new User();
        $email = $request->input('email');
        $password = $request->input('password');

        // Basic validation.
        if ($email && $password) {
            $identifiedUser = $user->getOne($email);

            if ($identifiedUser) {
                if (password_verify($password, $identifiedUser->password)) {
                    $authenticated = true;
                }
            }

            if ($authenticated) {
                return view('home', ['name' => $identifiedUser->name]);
            } else {
                return view('login', ['error' => 'Username or password supplied is incorrect']);
            }
        }
    }
}
