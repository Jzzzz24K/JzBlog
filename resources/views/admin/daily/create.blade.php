@extends('admin.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>标签
                    <small> >> 新增箴言</small>
                </h3>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h5>新增箴言</h5>
                    </div>
                    @include('partials.errors')
                    {{--                    @include('partials.success')--}}
                    <div class="card-body">
                        <form method="post" action="/admin/dailySay/save">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label text-center">内容</label>
                                <textarea rows="3" cols="40" class="col-sm-8" name="content"></textarea>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-4 offset-2">
                                    <button type="submit" class="btn btn-primary">创建</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
