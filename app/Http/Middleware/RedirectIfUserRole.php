<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectIfUserRole
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->hasRole('user')) {
            return redirect('/products');
        }

        return $next($request);
    }
}
