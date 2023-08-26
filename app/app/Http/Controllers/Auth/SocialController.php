<?php

namespace App\Http\Controllers\Auth;

use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SocialController extends Controller
{
    public function googleRedirect(): \Symfony\Component\HttpFoundation\RedirectResponse|\Illuminate\Http\RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallBack(): \Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application|\Illuminate\Routing\Redirector
    {

        $userSocial = Socialite::driver('google')->user();

        $user = User::updateOrCreate([
            'google_id' => $userSocial->id,
        ], [
            'name' => $userSocial->name,
            'email' => $userSocial->email,
            'github_token' => $userSocial->token,
            'github_refresh_token' => $userSocial->refreshToken,
        ]);

        Auth::login($user);

        return redirect('/dashboard');
    }
}
