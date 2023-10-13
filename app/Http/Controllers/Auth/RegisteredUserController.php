<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        // return view('auth.register');
        return view('superadmin.sp.manage_user_pages.form');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'middle_name' => ['required', 'string', 'max:255'],
            'student_number' => ['required', 'string', 'min:1', 'max:9'],
            'contact_number' => ['required', 'string', 'min:8','max:11'],
            'address' => ['required', 'string', 'max:255'],
            'guardian_name' => ['required', 'string', 'max:255'],
            'guardian_number' => ['required', 'string', 'min:8','max:11'],
            'guardian_address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            // 'status' => ['required', 'in:active,inactive'],
            'role' => ['required', 'in:superadmin,admin,student'],
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'surname' => $request->surname,
            'middle_name' => $request->middle_name,
            'student_number' => $request->student_number,
            'contact_number' => $request->contact_number,
            'address' => $request->address,
            'guardian_name' => $request->guardian_name,
            'guardian_number' => $request->guardian_number,
            'guardian_address' => $request->guardian_address,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // 'status' => $request->status,
            'role' => $request->role,
        ]);

        // event(new Registered($user));

        // Auth::login($user);
        return redirect('/superadmin/sp/users');
        // return redirect(RouteServiceProvider::HOME);
    }
}
