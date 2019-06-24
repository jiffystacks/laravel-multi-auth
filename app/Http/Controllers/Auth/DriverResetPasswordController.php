<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Password;
use Auth;

class DriverResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected $redirectTo = '/driver';

    public function __construct()
    {
        $this->middleware('guest:driver');
    }

    public function showResetForm(Request $request, $token = null) {
        return view('auth.passwords.driver-reset')
            ->with(['token' => $token, 'phone' => $request->phone]
            );
    }

    //defining which guard to use in our case, it's the admin guard
    protected function guard()
    {
        return Auth::guard('driver');
    }

    //defining our password broker function
    protected function broker() {
        return Password::broker('drivers');
    }
}
