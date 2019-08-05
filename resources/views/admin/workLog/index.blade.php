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
                                        <a class="btn btn-primary" href="/admin/workLog/edit?id={{$workLog->id}}">编辑</a>
                                        <button class="btn btn-danger delete" data-id="{{$workLog->id}}">删除</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal" tabindex="-1" role="dialog" id="delete">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">删除</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>确定要删除日志吗？</p>
                        </div>
                        <div class="modal-footer">
                            <form method="post" action="/admin/workLog/delete">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="_method" value="delete">
                                <input type="hidden" name="id" class="workId" value="">
                                <button type="submit" class="btn btn-danger">删除</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script>
        $(function () {
            $("#tags-table").DataTable({});

            $(".delete").click(function(){
                $("#delete").modal();
                var id = $(this).data('id');
                $(".workId").val(id);
            });
        });

    </script>

@stop
