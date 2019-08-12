<?php

namespace App\Http\Controllers\Admin;

use App\Model\WorkLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class WorkLogController extends Controller
{
    protected $fileds = [
        'content' => '',
        'type' => '',
        'image' => '',
        'like_count' => ''
    ];

    public function index()
    {
        $workLogs = WorkLog::all();
        return view('admin.workLog.index', compact('workLogs'));
    }

    public function create()
    {
        foreach ($this->fileds as $filed => $default) {
            $workLog[$filed] = old($filed, $default);
        }
        return view('admin.workLog.create', $workLog);
    }

    public function save(Request $request)
    {
        if ($request->file('image')) {
            foreach($request->file('image') as $images){
                $save = Storage::putFile('jzblog', $images);
                $url[] = Storage::url($save);
            }
        }
        $url = implode(';',$url);
        $workLog = new WorkLog();
        $workLog->content = $request->post('content');
        $workLog->type = $request->post('type');
        $workLog->image = $url ?? '';
        $workLog->save();
        return redirect('/admin/workLog')->with('success', '工作日志新增成功');
    }

    public function edit(Request $request)
    {
        $id = $request->input('id');
        $data = WorkLog::find($id);
        foreach ($this->fileds as $filed => $default) {
            $workLog[$filed] = $data->$filed;
        }
        return view('admin.workLog.update', $workLog);
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        WorkLog::destroy($id);
        return back()->with('success', '删除日志成功');
    }
}
