<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;

class UserController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth');
    // }

    // public function AllUser(){
    //     return view('superadmin.sp.manage_user_pages.index');
    // }

    // public function index(){
    //     $users = User::all();
    //     return view('superadmin.sp.manage_user_pages.index', compact('users'));
    // }

    // public function create(){
        
    //     return view('superadmin.sp.manage_user_pages.form');
    // }

    public function index(): Response
    {
        return response()->view('superadmin.sp.manage_user_pages.index', [
            'users' => User::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    public function form(){
        return view('superadmin.sp.manage_user_pages.form');
    }

    
}
