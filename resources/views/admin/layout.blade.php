<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <title>{{config('blog.title')}}后台</title>
    @yield('style')
</head>
<body>
<div class="container">
    <nav class="navbar navbar-light navbar-expand-md navbar-laravel sticky-top">
        <a class="navbar-brand col-md-3" href="#">{{config('blog.title')}}后台</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @auth
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item " style="margin-left: 20px">
                        <a class="nav-link" href="/">首页</a>
                    </li>
                    <li @if(Request::is('admin/post*'))
                        class="nav-item active"
                        @else
                        class="nav-item"
                        @endif
                        style="margin-left: 20px">
                        <a class="nav-link" href="/admin/post">文章</a>
                    </li>
                    <li @if(Request::is('admin/tag*'))
                        class="nav-item active"
                        @else
                        class="nav-item"
                        @endif
                        style="margin-left: 20px">
                        <a class="nav-link" href="/admin/tag">标签</a>
                    </li>
                    <li @if(Request::is('admin/upload*'))
                        class="nav-item active"
                        @else
                        class="nav-item"
                        @endif
                        style="margin-left: 20px">
                        <a class="nav-link" href="/admin/upload">上传</a>
                    </li>
                    <li @if(Request::is('admin/workLog*'))
                        class="nav-item active"
                        @else
                        class="nav-item"
                        @endif
                        style="margin-left: 20px">
                        <a class="nav-link" href="/admin/workLog">工作日志</a>
                    </li>
                </ul>
            </div>
        @endauth
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item"><a class="nav-link" href="/login">登录</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false">
                            {{ Auth::user()->name }}
                            <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="/logout">退出</a>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>

    </nav>
    <main class="py-4">
        @yield('content')
    </main>
</div>

<script src="{{ asset('js/app.js') }}"></script>
@yield('script')
</body>

</html>
