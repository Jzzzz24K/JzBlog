<nav class="navbar navbar-expand">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="navbar-brand text-black-50 font-weight-bolder" href="/">{{ config('blog.title') }}</a>
                </li>
            </ul>
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link font-weight-bolder text-black-50" href="/">首页</a>
                </li>
            </ul>
            <div class="dropdown">
                <a class="btn dropdown-toggle font-weight-bolder text-black-50" href="#" role="button" id="dropdownMenuLink"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    标签
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    @foreach($tags as $tag)
                    <a class="dropdown-item" href="/blog?tag={{$tag['tag']}}">{{$tag['tag']}}</a>
                    @endforeach()
                </div>
            </div>
        </div>


    </div>
</nav>


