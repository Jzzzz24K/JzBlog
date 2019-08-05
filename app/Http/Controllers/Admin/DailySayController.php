<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\DailySay;

class DailySayController extends Controller
{
    public function index()
    {
        $dailys = DailySay::orderBy('created_at','desc')->get();
        return view('admin.daily.index',compact('dailys'));
    }

    public function create()
    {
        return view('admin.daily.create');
    }

    public function save(Request $request)
    {
        $content = $request->input('content');
        $daily = new DailySay();
        $daily->content = $content;
        $daily->save();
        return redirect('/admin/dailySay')->with('success','箴言添加成功');
    }
}
