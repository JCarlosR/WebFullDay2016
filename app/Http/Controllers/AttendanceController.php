<?php

namespace App\Http\Controllers;

use App\Milestone;
use Illuminate\Http\Request;

use App\Http\Requests;

class AttendanceController extends Controller
{
    public function adminIndex()
    {
        $milestones = Milestone::all();
        return view('attendance.show')->with(compact('milestones'));
    }
}
