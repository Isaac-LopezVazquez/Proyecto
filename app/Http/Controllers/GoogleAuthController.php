<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    //

    public function AuthRedirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function googleCallback()
    {
        $user = Socialite::driver('google')->user();
        $this->_registerOrLoginUserGoogleUser($user);

        return redirect()->route('inicio'); //gmail directo a inicio
    }

    protected function _registerOrLoginUserGoogleUser($incomingUser)
    {
        $user = User::where('google_id', '=', $incomingUser->id)->first();
        if (!$user) {
            $user = new User();
            $user->name = $incomingUser->name;
            $user->email = $incomingUser->email;
            $user->google_id = $incomingUser->id;
            $user->password = bcrypt('password');
            $user->save();
        }
        Auth::login($user);
    }
}




