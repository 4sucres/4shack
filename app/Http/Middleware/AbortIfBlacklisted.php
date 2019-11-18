<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Blacklist;

class AbortIfBlacklisted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        abort_if(Blacklist::hasIpAddress($request->ip()), 403);

        return $next($request);
    }
}
