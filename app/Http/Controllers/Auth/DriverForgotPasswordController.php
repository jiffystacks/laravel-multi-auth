<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Password;
use App\Models\Driver;

class DriverForgotPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:driver');
    }

    public function showLinkRequestForm()
    {
        return view('auth.passwords.driver_email');
    }

    protected function broker() {
        return Password::broker('drivers');
    }

    public function showResetForm(){
        return view('auth.passwords.driver_reset');
    }

    public function sendResetLinkEmail(Request $request){
        $driver = Driver::where('phone', $request->phone)->first();
        if($driver){

        } else {
            
        }
    }
}
