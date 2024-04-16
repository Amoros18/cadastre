<?php

namespace App\Http\Middleware;

use closure;

class Archivage

{
    public function handle($request, Closure $next)
    {
        $user = $request->user();
        if ($user && $user->bureau === 'Chef')
        {
            return $next($request);
        }
        if ($user && $user->bureau === 'Archivage')
        {
            return $next($request);
        }
        return redirect()->route('home');
    }
}
