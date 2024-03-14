<?php

namespace Modules\My\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Modules\My\Entities\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirectToProvider(): \Symfony\Component\HttpFoundation\RedirectResponse|RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleCallback(): Redirector|RedirectResponse|Application
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect('/login');
        }

        if ($existingUser = User::where('google_id', $user->id)->first()) {
            Auth::login($existingUser);
        } else {
            $newUser = User::create(
                [
                    "name"      => $user->name,
                    "email"     => $user->email,
                    "google_id" => $user->id,
                    "password"  => bcrypt(Str::random(10))
                ]
            );
            Auth::login($newUser);
        }

        return redirect()->to('/');
    }
}
