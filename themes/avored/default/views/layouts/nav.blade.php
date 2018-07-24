<nav class="navbar navbar-expand-md navbar-dark bg-dark" style="padding:0;">
    <div class="container">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href=""><i class="glyphicon glyphicon-heart"></i> 我的管理</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href=""><i class="glyphicon glyphicon-th-list"></i> 博客</a>
            </li>
            <li class="nav-item">

                    <a class="nav-link" href="{{route('home1')}}"><img style="width: 15px;height: 15px;" src="{{asset('cartss.png')}}"> 购物商城</a>

                {{--<a class="nav-link" href="{{route('home')}}"><img style="width: 15px;height: 15px;" src="{{asset('cartss.png')}}"> 购物商城</a>--}}
            </li>
        </ul>
        <ul class="navbar-nav">

            @auth()

                <li class="nav-item active">
                    <a class="nav-link" href="#">欢迎 {{ Auth::user()->full_name }} !
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('logout') }}">注销
                        <span class="sr-only">(current)</span>
                    </a>
                </li>


            @endauth

            @guest()

            <li class="nav-item active">
                <a class="nav-link" href="#">欢迎主人来访
                    <span class="sr-only">(current)</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}"><span class="glyphicon glyphicon-user"></span>登录 </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">申请新帐号</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.login') }}">登录到管理员</a>
            </li>
            @endguest()

        </ul>
    </div>
</nav>

<header style="padding: 40px 0;">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <span style="font-size: 32px; font-weight: 500; margin-top: 10px;">
                        <img src="{{ asset('vendor/avored-default/images/logo.svg') }}" alt="logo" class="logo">梁日辉的Laravel
                    </span>
                </a>
            </div>
            <div class="col-md-6">
                <form class="navbar-form" action="{{ route('search.result') }}" method="get" role="search">
                    <div class="input-group" style="padding-top: 14px;">
                        <input type="text" class="form-control" placeholder="搜索整个商店在这里..." name="q">
                        <div class="input-group-btn">
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <!--<div class="col-md-1">
                <a class="nav-link" href="http://demo.avored.website/cart/view">Cart (0)</a>
            </div>-->
        </div>
    </div>
</header>
   
<nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container">
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
                data-target="#avored-navbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="avored-navbar">
            <ul class="navbar-nav mr-auto">
                @include('layouts.menu-tree',['menus' => $menus])
            </ul>
        </div>
    </div>
</nav>
