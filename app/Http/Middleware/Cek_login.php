<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Cek_login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */


    public function handle(Request $request, Closure $next, string $role): Response
    {
        $user = Auth::user();

        if($user && $user->is_admin == $role) {
            return $next($request);
        }

        return redirect('/login')->with('error', 'Sorry, you do not have access.');
    }
}
