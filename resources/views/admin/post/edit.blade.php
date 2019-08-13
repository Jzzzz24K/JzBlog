@extends('admin.layout')

@section('style')
    <link href="{{ asset('css/pickadate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/selectize.default.css') }}" rel="stylesheet">
@stop

@section('content')
    <div class="row col-md-5 offset-1">
        <h3>文章
            <small> >> 编辑文章</small>
        </h3>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h5>编辑文章表单</h5>
                </div>
                @include('partials.errors')
                @include('partials.success')
                <div class="card-body">
                    <form method="post" action="{{route('post.update',$id)}}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        @include('admin.post._form')
                        <div class="row">
                            <div class="col-md-5 offset-1">
                                <button type="submit" class="btn btn-primary"> 修改表单</button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete"> 删除表单</button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
    <div class="modal" tabindex="-1" role="dialog" id="modal-delete">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">删除文章</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>确定删除吗？</p>
                </div>
                <div class="modal-footer">
                    <form method="post" action="{{route('post.destroy',$id)}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="_method" value="delete">
                        <button type="submit" class="btn btn-danger">删除</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                    </form>
                    </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script src="{{ asset('js/pickadate.min.js') }}"></script>
    <script src="{{ asset('js/selectize.min.js') }}"></script>
    <script>
        $(function() {
            $("#publish_date").pickadate({
                format: "yyyy-mm-dd"
            });
            $("#publish_time").pickatime({
                format: "h:i A"
            });
            $("#tags").selectize({
                create: true
            });
        });
    </script>
@stop
