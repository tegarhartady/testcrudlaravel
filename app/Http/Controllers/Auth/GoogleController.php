<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Exception;
use App\User;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->first();
            if ($finduser) {
                Auth::login($finduser);

                return redirect('/users/show');
            } else {
                $newuser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => encrypt('123456'),
                    'active' => '1'
                ]);
                Auth::login($newuser);

                return redirect('/users/show');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
