<nav class="navbar navbar-expand">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav col-md-4">
                <li class="nav-item">
                    <a class="navbar-brand text-black font-weight-bolder" href="/">{{ config('blog.title') }}</a>
                </li>
            </ul>
            <ul class="navbar-nav col-md-4 justify-content-center">
                <li class="nav-item float-right">
                    <a class="nav-link font-weight-bolder text-black" href="/">
                        @if(Request::is('blog'))
                            首页
                        @elseif(Request::is('blog/*'))
                            文章详情
                        @elseif(Request::is('workLog/*'))
                            工作日志
                        @elseif(Request::is('series/*'))
                            系列
                        @endif
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav col-md-4  justify-content-end">
                <li class="nav-item">
                    <a class="btn nav-link font-weight-bolder text-black" href="/workLog/index">工作日志</a>
                </li>
                <li class="nav-item">
                    <a class="btn nav-link font-weight-bolder text-black" href="/series/index">系列</a>
                </li>
                @if(!empty($tags))
                    <div class="dropdown">
                        <a class="btn dropdown-toggle font-weight-bolder text-black-50" href="#" role="button"
                           id="dropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            标签
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            @foreach($tags as $tag)
                                <a class="dropdown-item" href="/blog?tag={{$tag['tag']}}">{{$tag['tag']}}</a>
                            @endforeach()
                        </div>
                    </div>
                @endif
            </ul>
        </div>
    </div>
</nav>


