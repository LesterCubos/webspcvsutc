<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use App\Models\SectionSwitch;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SwitchController extends Controller
{
    public function index()
    {
        $switch = SectionSwitch::all();

        return view('switch.index', compact('switch'));
    }

    public function storeSectionSwitch(Request $request)
    {
        $value = $request->input('value');
        $switch = new SectionSwitch;
        $switch->value = $value;
        $switch->save();
        return response()->json(['success' => true]);
    }

    public function getSectionSwitch()
    {
        $switch = SectionSwitch::latest()->first();
        return response()->json(['value' => $switch->value]);
    }



    // public function update(Request $request)
    // {
    //     $switch = $request->input('switch');

    //     foreach ($switch as $id => $status) {
    //         $swtch = SectionSwitch::findOrFail($id);
    //         $swtch->status = $status;
    //         $swtch->save();
    //     }

    //     return redirect()->back();
    // }
}
