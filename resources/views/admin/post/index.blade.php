@extends('admin.layout')

@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-5">
            <h3>文章
                <small> >> 列表</small>
            </h3>
        </div>
        <div class="col-md-5 text-right">
            <a href="/admin/post/create" class="btn btn-primary" >创建新文章</a>
        </div>
    </div>
    @include('partials.errors')
    @include('partials.success')
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <table class="table table-bordered" id="posts-table">
                <thead>
                <tr>
                    <th scope="col">发布时间</th>
                    <th scope="col">标题</th>
                    <th scope="col">副标题</th>
                    <th scope="col">操作</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <th scope="row">{{$post->published_at}}</th>
                            <td>{{$post->title}}</td>
                            <td>{{$post->subtitle}}</td>
                            <td>
                                <a href="{{route('post.edit',$post->id)}}" class="btn btn-primary">编辑</a>
                                <a href="/blog/{{ $post->slug }}" class="btn btn-primary">查看</a>
                            </td>
                        </tr>
                     @endforeach
                </tbody>
            </table>
        </div>
    </div>


@stop

@section('script')
    <script>
        $(function () {
            $("#posts-table").DataTable({});
        });
    </script>
@stop