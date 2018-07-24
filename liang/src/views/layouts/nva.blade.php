
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#" style="margin-left: 50px;">
                梁日辉博客论坛
            </a>
        </div>

    {{--<div class="logo">--}}
    {{--<a href="#">梁日辉博客论坛</a>--}}
    {{--</div>--}}

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="margin-right: 60px;">
        <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="#">首页</a></li>
            @if(Auth::check())
                <li><a href="#">{{Auth::user()->email}}</a></li>
                <li><a href="{{route('blog.logout')}}">注销</a></li>
                @else
                <li><a href="{{route('blog.login')}}">用户登录</a></li>
                <li><a href="{{route('blog.login')}}">注册用户</a></li>
                <li><a href="{{route('admin.login')}}">登录管理员用户</a></li>
            @endif
        </ul>

    </div>
    </div>
</div>


