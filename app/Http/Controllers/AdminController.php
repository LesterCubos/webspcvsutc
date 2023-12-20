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
use App\Models\ChangeInfoReq;
use App\Models\RequestDoc;
use App\Models\AdminAnnounce;
use App\Models\AcademicYear;
use App\Models\Legend;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function Dashboard(){
        $legends = Legend::all();
        $acadyears = AcademicYear::where('isActive', '1')->get();
        //Today
        $today = Carbon::today();
        $date = Carbon::now();

        //Month
        $month = Carbon::now()->month;

        // Year
        $yeardate = Carbon::now()->format('Y');
        $currentTime = Carbon::createFromFormat("Y-m-d H:i:s", date($date));

        $admin_announce = AdminAnnounce::orderBy('created_at', 'desc')->get();
        $announcediff = array();
        
        if ($admin_announce->isEmpty()) {
            $anchorTimeann = 0;
        } else {
            foreach($admin_announce as $admin_announce){
                
                $anchorTimeann[$admin_announce->id] = Carbon::createFromFormat("Y-m-d H:i:s",$admin_announce->created_at);
                $secondDiff = $anchorTimeann[$admin_announce->id]->diffInSeconds($currentTime);
                $minuteDiff = $anchorTimeann[$admin_announce->id]->diffInMinutes($currentTime);
                $hourDiff = $anchorTimeann[$admin_announce->id]->diffInHours($currentTime);
                $dayDiff = $anchorTimeann[$admin_announce->id]->diffInDays($currentTime);
                $announcediff[$admin_announce->id] = array($secondDiff, $minuteDiff, $hourDiff, $dayDiff);

            }
        }

        $admin_announces = AdminAnnounce::all();


        //Count
        $studentusers  = User::where('role','student')->count();
        $totalStuChanReq  = DB::table('change_info_reqs')->count();
        $pendingStuChanReq = ChangeInfoReq::where('status','pending')->count();
        $completedStuChanReq = ChangeInfoReq::where('status','completed')->count();
        $totalRequestDoc = DB::table('request_docs')->count();
        $pendingReqDoc = RequestDoc::where('status','pending')->count();
        $processingReqDoc = RequestDoc::where('status','processing')->count();
        $completedReqDoc = RequestDoc::where('status','completed')->count();

        $totalAnnounce = DB::table('admin_announces')->count();
        return view('admin.admin_dashboard',compact( 'totalAnnounce',
        'studentusers','totalStuChanReq','pendingStuChanReq','completedStuChanReq',
        'totalRequestDoc','pendingReqDoc','processingReqDoc','completedReqDoc',
        'legends', 'acadyears', 'admin_announces', 'currentTime','today','date','month', 'yeardate','announcediff',
        'anchorTimeann'
        ));
    }

    public function edit(Request $request): View
    {
        $acadyears = AcademicYear::where('isActive', '1')->get();
        $legends = Legend::all();
        
       
        return view('admin.profile.edit', [
            'user' => $request->user(),
        ],compact('acadyears', 'legends'));
    }

}
