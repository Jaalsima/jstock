<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirect($driver){
        return Socialite::driver($driver)->redirect();
    }

    public function callback($driver){
        $user = Socialite::driver($driver)->user();

        $user = User::updateOrCreate([
            'name' => $user->getName(),
            'email' => $user->getEmail(),
        ]);
        auth()->login($user);
        return redirect()->route('dashboard');
    }
}
