<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    const GOOGLE_TYPE = 'google';
    public function handleGoogleRedirect(){
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(){
        try {
            $user = Socialite::driver(static::GOOGLE_TYPE)->user();
            $userExisted = User::where('oauth_id', $user->id)->where('oauth_type', static::GOOGLE_TYPE)->first();
            if($userExisted){
                Auth::login($userExisted);
                return redirect()->route('dashboard');
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'oauth_id' => $user->id,
                    'oauth_type' =>  static::GOOGLE_TYPE,
                    'password' => Hash::make($user->id),
                ]);
                Auth::login($newUser);
                return redirect()->route('dashboard');
            }
        } catch (Exception $e) {
            dd($e);
        }
    }
}
