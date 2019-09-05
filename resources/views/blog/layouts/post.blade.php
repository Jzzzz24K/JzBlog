@extends('blog.layouts.master',[
  'title' => $post->title,
  'meta_description' => $post->meta_description ?? config('blog.description'),
  'tags' => []
])


@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.bootcss.com/github-markdown-css/3.0.1/github-markdown.css">
    <style>
        .article-back {
            background: #fff;
        }
    </style>
@stop
@section('page-header')
    <div class="container">
        <div class="row justify-content-center mx-auto">
            <h3>{{$post->title}}</h3>
        </div>
        <div class="row justify-content-center mt-5">
            <h5>{{$post->subtitle}}</h5>
        </div>

    </div>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 mt-5 pt-5  article-back">
                {{-- 文章详情 --}}
                <article class="markdown-body" style="padding-bottom: 20px">
                    {!! $post->content_html !!}
                    <div class="justify-content-center">
                        <hr  style="background-color: rgb(163,130,155)">

                        <img src="https://jingze.oss-cn-beijing.aliyuncs.com/jzblog/%E7%82%B9%E8%B5%9E.png" alt="点赞"
                             class="rounded mx-auto d-block" style="max-width: 80px"
                        />
                    </div>
                </article>
            </div>
            <div class="col-lg-4 col-md-3 mt-5 ">
                <div class="card">
                    <div class="card-header" style="background-color: rgb(163,130,155)">
                        <div class="row">
                            <div class="col-md-8">
                                其他相关文章
                            </div>

                        </div>
                    </div>
                    <div class="">
                        <ul class="list-group list-group-flush">
                            @foreach($correlation_post as $list)
                                <li class="list-group-item">
                                    <a href="/blog/{{$list->slug}}" class="card-link">{{str_limit($list->title,30)}}</a>
                                </li>
                            @endforeach()
                        </ul>
                    </div>
                </div>
                <div class="mt-5 container">
                    <div class="row">
                        <input type="text" class="form-control form-control-lg col-md-8" placeholder="全局搜索">
                        <button class="btn col-md-4" style="border-radius:5px;padding: 0 0;background-color: rgb(163,130,155)"
                                type="button">
                            搜索
                        </button>
                    </div>
                </div>
                <div class="card mt-5">
                    <div class="card-header"  style="background-color: rgb(163,130,155)">标签</div>
                    <div class="card-body">
                        @foreach($tags as $item)
                            <a href="/blog?tag={{$item}}" class="card-link">{{$item}}</a>
                        @endforeach()
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop

