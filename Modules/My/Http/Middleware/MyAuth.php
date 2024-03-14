<?php

namespace Modules\My\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class MyAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('my')->check()) {
            return Redirect()->route('my.login');
        }

        // Устанавливаем guard как дефолтный, чтобы не прописывать
        // Auth::guard('tenant')
        return $next($request);
    }
}
