<?php

namespace Modules\Lk\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class LkAuth
{

    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('lk')->check()) {
            return Redirect()->route('lk.login');
        }
//        $this->setSessionLocale();
        return $next($request);
    }

    private function setSessionLocale():void
    {
        $userLocale = Auth::guard('lk')->user()?->locale ?? config('app.locale');
        session()->put('locale',$userLocale);
    }
}
