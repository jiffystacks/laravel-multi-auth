<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use DB;
use Auth;

class PermissionPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function checkPermission($user, $expression){
        $condition = false;

        // check if the user is authenticated
        $role = request()->session()->get('user')['role'];
        /*$userAuth = app('auth')->user();
        $role = $userAuth->role;*/

        $permission = explode('|', $expression);

        if ($role) {
            return DB::table('permissions as p')
                ->join('role_has_permissions as r', 'r.permission_id', '=', 'p.id')
                ->where('r.role_id', $role)
                ->whereIn('p.name', $permission)
                ->select('p.id')
                ->first();
        }

        return $condition;
    }
}
