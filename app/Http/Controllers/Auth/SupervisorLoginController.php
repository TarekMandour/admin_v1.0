<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Supervisor;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Employee;
use Auth;

class SupervisorLoginController extends Controller
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
    protected $redirectTo = 'supervisors/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:supervisor')->except('logout');
    }

    public function showSupervisorLoginForm()
    {
        return view('supervisor.auth.login');
    }

    public function supervisorLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        $supervisor = Supervisor::whereEmail($request->email)->first();

        if($supervisor){
            if($supervisor->is_active == 1){
                if (Auth::guard('supervisor')->attempt(['email' => $request->email,'password' => $request->password, 'type' => 'supervisor'], $request->get('remember'))){
                    return redirect()->intended('/supervisors');
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
        Auth::guard('supervisor')->logout();
        return redirect('supervisors/login');
    }

}
