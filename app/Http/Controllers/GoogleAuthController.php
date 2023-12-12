<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleAuthController extends Controller
{

    public function callbackGoogle() {
        try {
            $google_user = Socialite::driver('google')->user();

            $user = User::where('id', $google_user->getId())->first();

            if(!$user) {
                $new_user = User::create([
                    'id' => $google_user->getId(),
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                ]) ;

                Auth::login($new_user);

                return redirect('/users');
            }else {
                Auth::login($user);

                return redirect('/users');
            }

        }

    }
}
