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
        $daily_language = DailySay::orderBy('created_at','desc')->firstOrFail();
        $workLogs = WorkLog::latest()->get();
        return view('blog.workLogs.index',compact('workLogs','daily_language'));
    }
}
