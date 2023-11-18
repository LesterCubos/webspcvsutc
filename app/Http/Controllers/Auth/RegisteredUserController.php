<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\AcademicYear;
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
        $temporaryPassword = 'temporaryPassword123.';

        $request->validate([
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'middleName' => ['required', 'string', 'max:255'],
            'studentNumber' => ['required', 'string', 'min:1', 'max:11'],
            'gender' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255'],
            'citizenship' => ['required', 'string', 'max:255'],
            'religion' => ['required', 'string', 'max:255'],
            'dateOfBirth' => ['required', 'date'],
            'street' => ['required', 'string', 'max:255'],
            'barangay' => ['required', 'string', 'max:255'],
            'municipality' => ['required', 'string', 'max:255'],
            'province' => ['required', 'string', 'max:255'],
            'mobilePhone' => ['required', 'string', 'min:8','max:11'],
            'role' => ['required', 'in:superadmin,admin'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        ]);

        $user = User::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'middleName' => $request->middleName,
            'studentNumber' => $request->studentNumber,
            'gender' => $request->gender,
            'status' => $request->status,
            'citizenship' => $request->citizenship,
            'religion' => $request->religion,
            'dateOfBirth' => $request->dateOfBirth,
            'street' => $request->street,
            'barangay' => $request->barangay,
            'municipality' => $request->municipality,
            'province' => $request->province,
            'mobilePhone' => $request->mobilePhone,
            'email' => $request->email,
            'password' => Hash::make($temporaryPassword),
            'role' => $request->role,
        ]);


        // event(new Registered($user));

        // Auth::login($user);
        return redirect('/superadmin/sp/users');
        // return redirect(RouteServiceProvider::HOME);
    }

    public function userView(User $user): View {

        return view('superadmin.sp.manage_user_pages.show', ['user' => $user, 'acadyears'=> AcademicYear::where('isActive', '1')->get()]);
    }

    public function destroy (Request $request, User $user) 
    {

        // Retrieve the superadmin user from the database
        $superadmins = User::where('role', 'superadmin')->get();

        foreach ($superadmins as $superadmin) {
            // Check if the password provided by the superadmin user is valid
            if (Hash::check($request->input('password'), $superadmin->password)) {
                // Proceed with the deletion of the user
                $user->delete();

                // Redirect to the users index page with a success message
                return redirect()->route('superadmin.sp.manage_user_pages.index')->with('notif.success', 'User deleted successfully.');
            } 
        } 
        
        // Return an error message indicating that the password is incorrect
        return redirect()->back()->with('notif.danger','The password is incorrect.');
    
       

    }

}
