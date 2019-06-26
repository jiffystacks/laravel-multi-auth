<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:driver')->except('logout');
    }

    public function showAdminLoginForm()
    {
        return view('auth.login', ['url' => 'admin']);
    }

    public function login(Request $request){
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            $user = Auth::user();
            $this->setSession([
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
                'guard' => 'web'
            ]);
            return redirect()->intended('/home');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            $user = Auth::guard('admin')->user();
            $this->setSession([
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
                'guard' => 'admin'
            ]);
            return redirect()->intended('/admin');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function showDriverLoginForm()
    {
        return view('auth.login', ['url' => 'driver']);
    }

    public function driverLogin(Request $request)
    {
        $this->validate($request, [
            'phone'   => 'required',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('driver')->attempt(['phone' => $request->phone, 'password' => $request->password], $request->get('remember'))) {
            $user = Auth::guard('driver')->user();
            $this->setSession([
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
                'guard' => 'driver'
            ]);
            return redirect()->intended('/driver');
        }
        return back()->withInput($request->only('phone', 'remember'));
    }

    public function logout(){
        request()->session()->flush();
        Auth::logout();
        return redirect('/home');
    }

    private function setSession($arr){
        Session::put('user', $arr);
    }
}
