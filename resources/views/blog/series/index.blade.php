@extends('blog.layouts.master',[
    'meta_description' => config('blog.description'),
    'tags'=>[],
])

@section('styles')
    <style>
        .jz-series{
            background: rgb(163,130,155);
        }
    </style>
@stop

@section('content')
    <div class="container">
        <div class="nav justify-content-center mt-5">
            <div class="font-weight-bold">
                系列主要整合一些模块化的技术，方便同意学习
            </div>
        </div>

        <div class="card-group mt-5">
            <div class="nav">
                <div class="card col-md-3 mx-auto mt-5" style="min-width: 300px;max-height: 300px;">
{{--                    <img class="card-img-top" src="..." alt="Card image cap">--}}
                    <div class="card-body">
                        <h5 class="card-title">数据结构与算法</h5>
                        <p class="card-text">学习数据结构和算法，对每个想要提升自己的程序员是必经之路。</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                <div class="card col-md-3 mx-auto mt-5" style="min-width: 300px;max-height: 300px;">
{{--                    <img class="card-img-top" src="..." alt="Card image cap">--}}
                    <div class="card-body">
                        <h5 class="card-title">面试</h5>
                        <p class="card-text">收集php基础、面向对象、laravel、redis、nginx、mysql、linux方面的面试题</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                <div class="card col-md-3 mx-auto mt-5" style="min-width: 300px;max-height: 300px;">
{{--                    <img class="card-img-top" src="..." alt="Card image cap">--}}
                    <div class="card-body">
                        <h5 class="card-title">swoole</h5>
                        <p class="card-text"></p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>

                <div class="card col-md-3 mx-auto mt-5" style="min-width: 300px;max-height: 300px;">
{{--                    <img class="card-img-top" src="..." alt="Card image cap">--}}
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
