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
            'sex' => ['required', 'string', 'max:255'],
            'civil_status' => ['required', 'string', 'max:255'],
            'nationality' => ['required', 'string', 'max:255'],
            'religion' => ['required', 'string', 'max:255'],
            'age' => ['required', 'string', 'max:255'],
            'birthday' => ['required', 'date'],
            'birth_place' => ['required', 'string', 'max:255'],
            'contact_number' => ['required', 'string', 'min:8','max:11'],
            'address' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'string', 'min:1', 'max:4'],
            'elementary_school' => ['required', 'string', 'max:255'],
            'juniorhigh_school' => ['required', 'string', 'max:255'],
            'seniorhigh_school' => ['required', 'string', 'max:255'],
            'program' => ['required', 'string', 'max:255'],
            'undergraduate_year' => ['required', 'string', 'max:255'],
            'student_classification' => ['required', 'string', 'max:255'],
            'registration_status' => ['required', 'string', 'max:255'],
            'guardian_name' => ['required', 'string', 'max:255'],
            'guardian_number' => ['required', 'string', 'min:8','max:11'],
            'guardian_occupation' => ['required', 'string', 'max:255'],
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
            'sex' => $request->sex,
            'civil_status' => $request->civil_status,
            'nationality' => $request->nationality,
            'religion' => $request->religion,
            'age' => $request->age,
            'birthday' => $request->birthday,
            'birth_place' => $request->birth_place,
            'contact_number' => $request->contact_number,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
            'elementary_school' => $request->elementary_school,
            'juniorhigh_school' => $request->juniorhigh_school,
            'seniorhigh_school' => $request->seniorhigh_school,
            'program' => $request->program,
            'undergraduate_year' => $request->undergraduate_year,
            'student_classification' => $request->student_classification,
            'registration_status' => $request->registration_status,
            'guardian_name' => $request->guardian_name,
            'guardian_number' => $request->guardian_number,
            'guardian_occupation' => $request->guardian_occupation,
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

    public function userView(User $user): View {

        return view('superadmin.sp.manage_user_pages.show', ['user' => $user]);
    }

    public function destroy (Request $request, User $user) {

        // Retrieve the superadmin user from the database
        $superadmin = User::where('role', 'superadmin')->first();

        // Check if the password provided by the superadmin user is valid
        if (Hash::check($request->input('password'), $superadmin->password)) {
            // Proceed with the deletion of the user
            $user->delete();

            // Redirect to the users index page with a success message
            return redirect()->route('superadmin.sp.manage_user_pages.index')->with('notif.success', 'User deleted successfully.');
        } else {
            // Return an error message indicating that the password is incorrect
            return redirect()->back()->with('notif.danger','The password is incorrect.');
        }

    }

}
