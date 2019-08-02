<?php

namespace App\Http\Controllers\Admin;

use App\Model\WorkLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WorkLogController extends Controller
{
    public function index()
    {
        $workLogs = WorkLog::all();
        return view('admin.workLog.index',compact('workLogs'));
    }

    public function create()
    {
        return view('admin.workLog.create');
    }
}
