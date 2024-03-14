<?php

namespace Modules\My\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use \Illuminate\Contracts\View\View;
use Modules\My\Jobs\Amplitude\AmplitudeForgotPasswordJob;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        AmplitudeForgotPasswordJob::dispatch();
        return view('my::auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'email' => ['required', 'email'],
            ]
        );

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::broker("my")->sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
            ? redirect()->route('my.password.sent')->with('email',$request->email)
            : back()->withInput($request->only('email'))
                ->withErrors(['email' => __($status)]);
    }

    public static function sent():View
    {
        return view('my::auth.verify-email');
    }

}
