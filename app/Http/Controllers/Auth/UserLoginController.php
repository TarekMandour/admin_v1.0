<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Employee;
use Auth;

class UserLoginController extends Controller
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
    protected $redirectTo = 'user/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:web')->except('logout');
    }

    public function showUserLoginForm()
    {
        return view('user.auth.login');
    }

    public function userLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        $user = User::whereEmail($request->email)->first();

        if($user){
            if($user->is_active == 1){
                if (Auth::guard('web')->attempt(['email' => $request->email,'password' => $request->password], $request->get('remember'))){
                    return redirect()->intended('/user');
                } else {
                    return back()->withErrors(['password' => trans('auth.error_password') ])->withInput($request->only('email', 'remember'));
                }
            } else {
                return back()->withErrors(['email' => trans('auth.error_is_active')])->withInput($request->only('email', 'remember'));
            }
        } else {
            return back()->withErrors(['email' => trans('auth.error_email')])->withInput($request->only('email', 'remember'));
        }

        return back()->withInput($request->only('email', 'remember'));
    }

    public function logout() {
        Auth::guard('web')->logout();
        return redirect('user/login');
    }

}
