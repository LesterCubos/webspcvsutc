<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Request\ContactRequest;

class ContactController extends Controller
{

    public function show(){
        return view('pages.contact_info.blade.php');
    }

    public function submit(ContactRequest $request){
        
    }
}
