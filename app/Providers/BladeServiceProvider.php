<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use DB;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('haveaccess', function ($expression) {
            $condition = false;

            // check if the user is authenticated
            $role = request()->session()->get('user')['role'];
            if ($role) {
                return DB::table('permissions as p')
                    ->join('role_has_permissions as r', 'r.permission_id', '=', 'p.id')
                    ->where('r.role_id', $role)
                    ->where('p.name', $expression)
                    ->select('p.id')
                    ->first();
            }

            return $condition;
        });
    }
}
