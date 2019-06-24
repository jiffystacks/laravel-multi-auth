<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Password;
use Auth;

class AdminResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showResetForm(Request $request, $token = null) {
        return view('auth.passwords.admin_reset')
            ->with(['token' => $token, 'email' => $request->email]
            );
    }

    //defining which guard to use in our case, it's the admin guard
    protected function guard()
    {
        return Auth::guard('admin');
    }

    //defining our password broker function
    protected function broker() {
        return Password::broker('admins');
    }
}
