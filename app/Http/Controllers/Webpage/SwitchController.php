<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use App\Models\SectionSwitch;
use Illuminate\Http\Request;

class SwitchController extends Controller
{
    public function index()
    {
        $switch = SectionSwitch::all();

        return view('switch.index', compact('switch'));
    }

    public function update(Request $request)
    {
        $switch = $request->input('switch');

        foreach ($switch as $id => $status) {
            $swtch = SectionSwitch::findOrFail($id);
            $swtch->status = $status;
            $swtch->save();
        }

        return redirect()->back();
    }
}
