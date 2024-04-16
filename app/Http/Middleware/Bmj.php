<?php

namespace App\Http\Middleware;

use closure;

class Bmj
{
    public function handle($request, Closure $next)
    {
        $user = $request->user();
        if ($user && $user->bureau === 'Chef')
        {
            return $next($request);
        }
        if ($user && $user->bureau === 'Bureau de mise a jour')
        {
            return $next($request);
        }
        return redirect()->route('home');
    }
}
