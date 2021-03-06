<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function register(Request $request, MessageBag $bag)
    {
        $user = new User();
        $email = $request->input('email');
        $password = $request->input('password');

        if ($email && $password) {
            // Sanitise user input.
            $sanitisedEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
            $sanitisedPassword = filter_var($password, FILTER_SANITIZE_STRING);
            $hashedPassword = password_hash($sanitisedPassword, PASSWORD_DEFAULT);

            // User can't register if they have an account obviously.
            if (empty($user->getOne($sanitisedEmail))) {
                $name = $request->input('firstName') . ' ' . $request->input('lastName');

                $user->name = $name;
                $user->email = $sanitisedEmail;
                $user->password = $hashedPassword;
                $user->created_at = now();
                $user->save();

                return redirect('/');
            } else {
                $bag->add('emailExists', 'An account with email provided already exists');

                return back()->withErrors($bag);
            }
        }
    }
}
