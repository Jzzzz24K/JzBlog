@extends('admin.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>标签
                    <small> >> 新增标签</small>
                </h3>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h5>新增标签表单</h5>
                    </div>
                    @include('partials.errors')
{{--                    @include('partials.success')--}}
                    <div class="card-body">
                        <form method="post" action="/admin/tag">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            @include('admin.tag._form')
                            <div class="form-group row offset-2">
                                <button type="submit" class="btn btn-primary col-md-3">添加新标签</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop