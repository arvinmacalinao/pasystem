<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Role;
use App\Models\User;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $roles): Response
    {
        if (!Auth::check()) {
            $request->session()->put('session_msg', 'Your account does not have privilege for this action.');
            return redirect('/'); // Or return abort(403);
        }

        $user = Auth::user();
        $roleNames = explode('|', $roles);

        if (!$user->role || !in_array($user->role->name, $roleNames)) {
            $request->session()->put('session_msg', 'Your account does not have privilege for this action.');
            return redirect('/'); // Or return abort(403);
        }

        return $next($request);
    }
}
