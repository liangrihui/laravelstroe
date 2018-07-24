
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>梁日辉</title>
</head>

<body>
<div id="container">
    <canvas id="waterfall">
    </canvas>

    <div class="nav-center">
        <div class="first_neon"><a href="{{route('manage.index')}}" 》>我的管理</a></div>
        <div class="second_neon"><a href="{{route('blog.index')}}">我的博客</a></div>
        <div class="third_neon"><a>我的学习</a></div>
        <div class="forth_neon"><a href="{{route('home1')}}">我的商城</a></div>
    </div>

</div>

<script type="text/javascript" src="{{asset('js/pixi.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/tinycolor.min.js')}}"></script>
<script  src="{{asset('js/index.js')}}"></script>
</body>
</html>