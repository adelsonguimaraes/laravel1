<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/config';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index (Request $r) {
        $tries = $r->session()->get('login_tries', 0);

        // $frase = __('messages.tryerror', ['count'=>5]);

        // echo "FRASES: {$frase}";

        return view('auth.login', ['tries'=>$tries]);
    }

    public function authenticate (Request $r) {
        $creds = $r->only(['email', 'password']);
        $tries = intval($r->session()->get('login_tries', 0));

        // get, put, forget
        // $r->session()->forget('login_tries');
        
        if (Auth::attempt($creds)) {
            $r->session()->put('login_tries', 0);
            return redirect()->route('config.index');
        }else{
            $r->session()->put('login_tries', ++$tries);

            return redirect()->route('login')->with(
                'warning', 'E-mail ou senha inválidos!'
            );
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
