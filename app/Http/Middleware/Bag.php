<?php

namespace App\Http\Middleware;

use closure;

class Bag
{
    public function handle($request, Closure $next)
    {
        $user = $request->user();
        if ($user && $user->bureau === 'Chef')
        {
            return $next($request);
        }
        if ($user && $user->bureau === 'Bureau des affaires generale')
        {
            return $next($request);
        }
        return redirect()->route('home')->with('unauthorized', 1);
    }
}
