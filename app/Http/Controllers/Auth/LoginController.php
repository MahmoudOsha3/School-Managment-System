<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Auth ;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Traits\AuthTrait ;

class LoginController extends Controller
{

    // use AuthenticatesUsers;
    use AuthTrait ;
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginForm($type)
    {
        return view('auth.login' , compact('type'));
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        if(Auth::guard($this->checkGuard($request))->attempt(['email' => $request->email, 'password' => $request->password]))
        {
            return $this->redirectAuth($request);
        }

        return redirect()->back()->withErrors(['email' => trans('auth.failed')])->withInput();
        // throw ValidationException::withMessages([
        //     'email' => [trans('auth.failed')],
        // ]);
    }

    public function logout(Request $request ,$type)
    {
        Auth::guard($type)->logout() ;
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('selection') ;
    }

}
