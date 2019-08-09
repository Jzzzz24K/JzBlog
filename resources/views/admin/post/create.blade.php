@extends('admin.layout')

@section('style')
    <link href="{{ asset('css/pickadate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/selectize.default.css') }}" rel="stylesheet">
@stop

@section('content')
    <div class="row col-md-5 offset-1">
        <h3>文章
            <small> >> 创建新文章</small>
        </h3>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h5>创建新文章表单</h5>
                </div>
                @include('partials.errors')
                @include('partials.success')
                <div class="card-body">
                    <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        @include('admin.post._form')
                        <div class="row">
                            <div class="col-md-5 offset-1">
                                <button type="submit" class="btn btn-primary"> 保存表单</button>
                            </div>
                        </div>
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
