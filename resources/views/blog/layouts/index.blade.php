@extends('blog.layouts.master')

@section('page-header')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-10">
                @foreach($posts  as $post)
                    <div class="card mt-md-5 bg-dark text-white border-0" id="card">
                        <img class="card-img img-card"
                             src="{{ page_image($post->page_image) }}" alt="Card image">
                        <div class="card-img-overlay">
                            <div class="card-text text-center jz-img-text">
                                <a class="nav-link text-white jz-blog-title" href="{{ $post->url($tag) }}">{{$post->title}}</a>
                                <time>{{$post->publish_date}}</time>
                                <h5>{!! join(', ', $post->tagLinks()) !!}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop