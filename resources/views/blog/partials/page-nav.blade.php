<div class="container">
    <nav class="navbar navbar-expand ">
        <div class="container">
            {{-- Brand and toggle get grouped for better mobile display --}}
            {{--            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">--}}
            {{--                导航菜单--}}
            {{--                <i class="fas fa-bars"></i>--}}
            {{--            </button>--}}

            {{-- Collect the nav links, forms, and other content for toggling --}}
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="navbar-brand text-black-50 font-weight-bolder" href="/">{{ config('blog.title') }}</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/">首页</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/">标签</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>


