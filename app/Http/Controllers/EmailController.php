<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Support\Facades\Auth;

class EmailController extends Controller
{
    public function verify($token)
    {
        $user = User::where("confirmation_token", $token)->first();

        if (is_null($user)) {
            return redirect('/');
        }

        $user->is_active          = 1;
        $user->confirmation_token = str_random(48);
        $user->save();

        Auth::login($user);
        return redirect('/home');
    }

    public function hasBeenSend()
    {
        return view('mail.has_been_send');
    }
}
