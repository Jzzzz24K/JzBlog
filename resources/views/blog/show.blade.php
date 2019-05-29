<html>
<header>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <title>{{config('blog.title')}}</title>
</header>
   <body>
        <div class="container">
            <div>
                <h1>{{$data->title}}</h1>

                <h5>{{$data->published_at}}</h5>

                <hr>
                {!! nl2br(e($data->content)) !!}
                <hr>
                <button type="button" class="btn btn-primary" onclick="history.go(-1)"><< Back</button>
            </div>
        </div>
   </body>
</html>
