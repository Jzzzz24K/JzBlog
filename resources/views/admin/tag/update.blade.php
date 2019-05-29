@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <h3>标签
                <small> >> 编辑标签</small>
            </h3>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        编辑标签
                    </div>
                    <div class="card-body">
                        <form method="post" action="/admin/tag/{{$id}}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="_method" value="put">
                            @include('admin.tag._form')
                            <div class="row">
                                <div class="col-md-5 offset-2">
                                    <button type="submit" class="btn btn-primary">保存修改</button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#exampleModal">删除
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" tabindex="-1" role="dialog" id="exampleModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">删除标签</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>是否删除该标签</p>
                    </div>
                    <div class="modal-footer">
                        <form method="post" action="/admin/tag/{{$id}}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="_method" value="delete">
                            <button type="submit" class="btn btn-primary">是</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">否</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop