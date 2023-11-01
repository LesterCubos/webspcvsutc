<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AcademicYear;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth');
    // }

    public function index(): Response
    {
        return response()->view('superadmin.sp.manage_user_pages.index', [
            'users' => User::orderBy('updated_at', 'desc')->get(), 'acadyears'=> AcademicYear::where('isActive', '1')->get()
        ]);
    }

    public function form(){
        $acadyears = AcademicYear::where('isActive', '1')->get();
        return view('superadmin.sp.manage_user_pages.form', compact('acadyears'));
    }   
}
