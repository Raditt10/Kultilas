<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     * Usage in routes: ->middleware(['auth','role:admin']) or multiple roles ->middleware(['role:admin,pembina'])
     */
    public function handle($request, Closure $next, $roles = null)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        if ($roles) {
            $allowed = array_map('trim', explode(',', $roles));
            if (!in_array(strtolower($user->role), array_map('strtolower', $allowed))) {
                abort(403, 'Unauthorized');
            }
        }

        return $next($request);
    }
}
