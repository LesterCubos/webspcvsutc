<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $url = '';
        if ($request->user()->isActive == 1) {
        if($request->user()->role === 'superadmin'){
            $url = '/superadmin/dashboard';
        } elseif ($request->user()->role === 'admin'){
            $url = '/admin/dashboard';
        } elseif ($request->user()->role === 'student'){
            Session::put('studentNumber', $request->input('studentNumber'));
            $url = '/student/dashboard';
        }
        } else {
            $url = '/student_login';
            Auth::guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();
            return redirect()->intended($url)->with('error','Account Session Expired!!'); 
        }
        // orig 
        // return redirect()->intended(RouteServiceProvider::HOME)->with('error','Login Successfully');
        return redirect()->intended($url)->with('success','Login Successfully!!');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $url = '';
        if($request->user()->role === 'admin' || $request->user()->role === 'superadmin'){
            $url = '/login';
        } 
        elseif ( $request->user()->role === 'student'){
            $url = '/student_login';
        } 
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        
        return redirect()->intended($url)->with('error','Logout Successfully');      
        // return redirect('/')->with('error','Logout Successfully');
    }
}
