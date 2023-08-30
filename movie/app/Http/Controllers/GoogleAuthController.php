<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {

        $google_user = Socialite::driver('google')->user();

        $user = User::where('google_id', $google_user->getId())->orWhere('email', $google_user->getEmail())->first();
        // dd($user);
        if (!$user) {
            $new_user = User::create([
                'name' => $google_user->getName(),
                'email' => $google_user->getEmail(),
                'google_id' => $google_user->getId(),
                'avatar' => $google_user->getAvatar(),
            ]);
            $guserInfo = [
                $name = $google_user->getName(),
                $email = $google_user->getEmail(),
                $avatar = $google_user->getAvatar(),
            ];
            Auth::login($new_user);
            return view('movies.index',$guserInfo);
        } else {
            Auth::login($user);
            return redirect()->intended('movies');
        }
    }
}
