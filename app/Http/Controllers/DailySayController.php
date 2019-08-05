<?php

namespace App\Http\Controllers;

use App\Model\DailySay;
use Illuminate\Http\Request;

class DailySayController extends Controller
{
    public function index()
    {
        DailySay::all();
        return view('admin.daily.index');
    }
}
