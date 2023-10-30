<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\InstructorPageSwitch;

class PageStatusMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $switch = InstructorPageSwitch::find(1);

        if ($switch->isActive == '1') {
            return $next($request);
        }
    
        return redirect('/')->with('error', 'This page is not accessible.');
    }
}
