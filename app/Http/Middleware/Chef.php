<?php

namespace App\Http\Middleware;

use closure;

class Chef
{
    public function handle($request, Closure $next)
    {
        $user = $request->user();
        if ($user && $user->bureau === 'Chef')
        {
            return $next($request);
        }
        return redirect()->route('home');
    }
}
