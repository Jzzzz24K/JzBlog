@extends('admin.layout')

@section('content')
    <div class="row justify-content-md-center">
        <div class=" col-md-6">
            @include('partials.errors')
            <div class="card  text-black-50 bg-light">
                <div class="card-header">登录</div>
                <div class="card-body">
                    <form method="post" action="/login">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="form-group row text-center">
                            <label for="email" class="col-sm-2 col-form-label">邮箱</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="email" placeholder="邮箱">
                            </div>
                        </div>
                        <div class="form-group row text-center">
                            <label for="inputPassword" class="col-sm-2 col-form-label">密码</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="password" placeholder="密码">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 offset-2">
                                <div class="form-check">
                                    <label>
                                        <input class="form-check-input" type="checkbox" name="remember">记住我
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-md-center">
                            <button type="submit" class="btn btn-primary col-md-4">
                                登录
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@stop