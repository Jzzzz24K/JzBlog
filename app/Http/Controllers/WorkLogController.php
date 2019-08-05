<?php

namespace App\Http\Controllers;

use App\Model\DailySay;
use App\Model\WorkLog;
use Illuminate\Http\Request;

class WorkLogController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $daily_language = DailySay::orderBy('created_at','desc')->first();
        $workLogs = WorkLog::all();
        return view('blog.workLogs.index',compact('workLogs','daily_language'));
    }
}
