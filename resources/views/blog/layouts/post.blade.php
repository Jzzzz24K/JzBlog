@extends('blog.layouts.master',[
  'title' => $post->title,
  'meta_description' => $post->meta_description ?? config('blog.description'),
  'tags' => []
])


@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.bootcss.com/github-markdown-css/3.0.1/github-markdown.css">
    <style>

        .jz-post-header {
            {{--background-image: url("{{page_image($post->page_image)}}");--}}
                 background-size: cover;
            background-attachment: fixed;
            background: no-repeat center center;
            background-attachment: scroll;
        }

        .jz-post-image {
            opacity: 0.5;
        }

        .title-image {
            width: 100%;
            height: 500px;
            overflow: hidden;
            background-image: url({{$post->page_image}});
            /*background-image: url('/storage/uploads/背影.jpg');*/
            background-position: center center;
            background-size: cover;
            background-repeat: no-repeat;
            opacity: 0.5;
        }
        .jz-post {
            height: 500px;
            opacity: 0.7;
            background-image: url({{$post->page_image}});
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
        }
        .article-back{
            background: #fff;
        }
    </style>
@stop
@section('page-header')
    <div class="container" style="margin-top:5rem;">
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
                        <img src="https://jingze.oss-cn-beijing.aliyuncs.com/jzblog/%E7%82%B9%E8%B5%9E.png" alt="点赞"
                             class="rounded mx-auto d-block" style="max-width: 80px"
                        />
                    </div>
                </article>
            </div>
            <div class="col-lg-4 col-md-3 mt-5 pt-5 ">
                <card>
                    其他相关文章
                </card>
            </div>
        </div>
    </div>


@stop

