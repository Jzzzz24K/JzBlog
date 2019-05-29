@extends('admin.layout')

@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-6">
                    <h3>标签
                        <small> >> 列表</small>
                    </h3>
                </div>
                <div class="col-md-6 text-right">
                    <a class="btn btn-primary" href="/admin/tag/create">新增标签</a>
                </div>
            </div>
            @include('partials.success')
            @include('partials.errors')
            <div class="row">
                <div class=" col-md-12">
                    <table class="table table-bordered" id="tags-table">
                        <thead>
                        <tr>
                            <th scope="col">标签</th>
                            <th scope="col">标题</th>
                            <th scope="col">副标题</th>
                            <th scope="col">页面图片</th>
                            <th scope="col">描述信息</th>
                            <th scope="col">布局</th>
                            <th scope="col">排序</th>
                            <th scope="col">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tags as $tag)
                            <tr>
                                <td>{{$tag->tag}}</td>
                                <td>{{$tag->title}}</td>
                                <td>{{$tag->subtitle}}</td>
                                <td>{{$tag->page_image}}</td>
                                <td>{{$tag->meta_description}}</td>
                                <td>{{$tag->layout}}</td>
                                <td>
                                    @if($tag->reverse_direction)
                                        逆序
                                    @else
                                        升序
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="/admin/tag/{{$tag->id}}}/edit">编辑</a>
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