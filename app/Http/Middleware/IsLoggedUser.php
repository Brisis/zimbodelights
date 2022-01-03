<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsLoggedUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $logged_user = auth()->user();
        if (!$logged_user) {
          session()->put('is_logged', true);
        }

        session()->put('is_logged', false);

        return $next($request);
    }
}
