@extends('blog.layouts.master',[
  'meta_description' => config('blog.description'),
  'tags'=>[],
])

@section('page-header')
    <div class="container" style="margin-top:5rem;">
        <div class="row justify-content-center mx-auto">
            <h3>记录每天的工作日志</h3>
        </div>
        <div class="row justify-content-center mt-5">
            <h5>箴言：</h5>
        </div>
        <div class="row justify-content-center mt-3">
            <h5 style="word-break: break-word;width: 500px; text-align: center">{{$daily_language->content}}</h5>
        </div>
    </div>
@stop
@section('content')
    <div class="container bg-light">
        @foreach($workLogs as $workLog)
            <div class="row pt-5">
                <div class="col-md-2">
                    <time>{{$workLog['created_at']}}</time>
                </div>
                <div class="col-md-10">
                    <div class="row" style="display: flex;">
                        @if(!empty($workLog['image']))
                            <div class="col-md-12">
                                <div class="row">
                                    @foreach($workLog['image'] as $images)
                                    <img src="{{$images}}" class="col-md-3 img-fluid">
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-7">
                            <h5 style="word-break:break-all;">{{$workLog['content']}}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <hr/>
        @endforeach
    </div>
@stop

