<?php

namespace App\Http\Middleware;

use Closure;
use DB;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ... $role)
    {
        $role = DB::table('roles')->whereIn('name', $role)->first();
        if($role){
            if($role->id != $request->user()->role){
                abort(403, 'Unauthorized action.');
            }    
        } else {
            abort(404, 'User Role Does not exist');
        }
        
        return $next($request);
    }
}
