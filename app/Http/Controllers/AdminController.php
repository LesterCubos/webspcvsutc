<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\AcademicYear;

class AdminController extends Controller
{
    public function Dashboard(){
        $acadyears = AcademicYear::where('isActive', '1')->get();
        return view('admin.admin_dashboard',compact('acadyears'));
    }

    public function edit(Request $request): View
    {
        $acadyears = AcademicYear::where('isActive', '1')->get();
       
        return view('admin.profile.edit', [
            'user' => $request->user(),
        ],compact('acadyears'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('admin.profile.edit')->with('status', 'profile-updated');
    }

    public function checkPassword($attribute, $value, $parameters, $validator)
    {
        return Hash::check($value, Auth::user()->password);
    }

    public function store(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image',
        ]);
  
        $avatarName = time().'.'.$request->avatar->getClientOriginalExtension();
        $request->avatar->move(public_path('avatars'), $avatarName);
  
        Auth()->user()->update(['avatar'=>$avatarName]);
  
        return back()->with('success', 'Avatar updated successfully.');
    }

}
