@extends('admin.layout')
@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-6">
                    <h3>每日一记
                        <small> >> 列表</small>
                    </h3>
                </div>
                <div class="col-md-6 text-right">
                    <a class="btn btn-primary" href="/admin/workLog/create">新增日志</a>
                </div>
            </div>
            @include('partials.success')
            @include('partials.errors')
            <div class="row">
                <div class=" col-md-12">
                    <table class="table table-bordered" id="tags-table">
                        <thead>
                        <tr>
                            <th scope="col">内容</th>
                            <th scope="col">类型</th>
                            <th scope="col">图片</th>
                            <th scope="col">点赞数量</th>
                            <th scope="col">创建时间</th>
                            <th scope="col">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($workLogs as $workLog)
                                <tr>
                                    <td>{{$workLog->content}}</td>
                                    <td>{{$workLog->type}}</td>
                                    <td>{{$workLog->image}}</td>
                                    <td>{{$workLog->like_count}}</td>
                                    <td>{{$workLog->created_at}}</td>
                                    <td>
                                        <button class="btn btn-primary">编辑</button>
                                        <button class="btn btn-danger">删除</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@stop

@section('script')
    <script>
        $(function () {
            $("#tags-table").DataTable({});
        });
    </script>

@stop
