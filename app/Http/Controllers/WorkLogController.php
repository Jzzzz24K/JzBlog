<?php

namespace App\Http\Controllers;

use App\Model\WorkLog;
use Illuminate\Http\Request;

class WorkLogController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $workLogs = WorkLog::all();
        return view('blog.workLogs.index',compact('workLogs'));
    }
}
