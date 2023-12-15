<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AcademicYear;
use App\Models\Legend;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth');
    // }

    public function index(): Response
    {
        return response()->view('superadmin.sp.manage_user_pages.index', [
            'users' => User::orderBy('updated_at', 'desc')->get(), 'acadyears'=> AcademicYear::where('isActive', '1')->get(),
            'legends' => Legend::all(),
        ]);
    }

    public function form(){
        $acadyears = AcademicYear::where('isActive', '1')->get();
        $legends = Legend::all();
        return view('superadmin.sp.manage_user_pages.form', compact('acadyears', 'legends'));
    }   

    public function resetPassword($id) {
        $user = User::findOrFail($id);
        if ($user) {
            $password = $user->generateRandomPassword();
            $hashedPassword = Hash::make($password);
            $user->password = $hashedPassword;
            $user->save();

            session()->flash('notif.success', 'Password reset successfully. New password is: ' . $password);
            return redirect()->route('superadmin.sp.manage_user_pages.show', ['user' => $id]);
        } else {
            session()->flash('notif.danger', 'User not found. ');
            return redirect()->route('superadmin.sp.manage_user_pages.show', ['user' => $id]);
        }
    }
}
