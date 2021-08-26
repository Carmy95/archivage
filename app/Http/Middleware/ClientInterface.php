<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientInterface
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $service = Auth::user()->personne->service->id;
                $departement = Auth::user()->personne->service->departement->id;
                if ($service == 1 && $departement == 1) {
                    return redirect()->route('admin.404');
                }
            }
        }
        return $next($request);
    }
}
