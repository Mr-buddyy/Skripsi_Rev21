<?php

namespace App\Http\Middleware;

use Closure;

class ForceHttps
{
    public function handle($request, Closure $next)
    {
        if (!$request->secure()) {
            return redirect()->secure($request->path());
        }

        return $next($request);
    }
}
