<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        $userGoogle = Socialite::driver('google')->user();
        $userExists = User::where('external_id', $userGoogle->getId())
                        ->where('external_auth', 'google')->first();

        if($userExists){
            Auth::login($userExists);
        }else {
            $userNew = User::create([
                'email' => $userGoogle->getEmail(),
                'avatar' => $userGoogle->getAvatar(),
                'enable' => 1,
                'external_id' => $userGoogle->getId(),
                'external_auth' => 'google',
            ]);
            Auth::login($userNew);
        }
        
        return redirect('/home');
 
    }
}
