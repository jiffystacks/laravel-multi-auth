<?php

namespace App\Http\Middleware;

use Closure;

class Permission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        if (app('auth')->guest()) {
            abort(403, 'Unauthorized action.');
        }
        $permissions = is_array($permission)
            ? $permission
            : explode('|', $permission);
        foreach ($permissions as $permission) {
            if (app('auth')->user()->can("haspermission", $permission)) {
                return $next($request);
            }
        }
        
        abort(403, 'User does not have the right permissions.');
    }
}
