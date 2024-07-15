<?php

namespace App\Http\Middleware;

use closure;

class Geometre
{
    public function handle($request, Closure $next)
    {
        $user = $request->user();
        if ($user && $user->bureau === 'Chef')
        {
            return $next($request);
        }
        if ($user && $user->bureau === 'Bureau de geometre')
        {
            return $next($request);
        }
        return redirect()->route('home')->with('unauthorized', 1);
    }
}
