<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $meta_description }}">
    <meta name="author" content="{{ config('blog.author') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? config('blog.title') }}</title>

    {{-- Styles --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body
    @if (Request::is('blog')) class="jz-body" @endif
>
<div
    @if (Request::is('blog/*')) style="border-top:10px;border-style: solid;border-color:rgb(163,130,155);" @endif></div>
<div @if (Request::is('workLog/index')) class="jz-worklog" @endif>
    @include('blog.partials.page-nav',$tags)
    @yield('page-header')
</div>
@yield('content')
{{-- Scripts --}}
<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')

</body>
@include('blog.partials.page-footer')

</html>
