<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Password;

class AdminForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showLinkRequestForm()
    {
        return view('auth.passwords.admin_email');
    }

    protected function broker() {
        return Password::broker('admins');
    }

    public function showResetForm(){
        return view('auth.passwords.admin_reset');
    }
}
