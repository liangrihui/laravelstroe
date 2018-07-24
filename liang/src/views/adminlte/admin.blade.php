<!DOCTYPE html>
<!--
这是一个starter模板页面。使用这个页面启动您的新项目
从零开始。这个页面去掉所有的链接，只提供所需的标记。
-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>梁日辉</title>
    <!-- 告诉浏览器对屏幕宽度的响应 -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">


    <!-- Font Awesome奥森字体图标 -->
    <link rel="stylesheet" href="{{asset('adminlte/css/font-awesome.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('adminlte/css/ionicons.css')}}">
    <!-- Theme style 主题风格-->
    <link rel="stylesheet" href="{{asset('adminlte/css/AdminLTE.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/css/bootstrap.css')}}">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
          AdminLTE皮肤。我们为这个启动器选择了淡蓝色
  页面。但是，你可以选择任何其他的皮肤。确保你
  将皮肤类应用到body标签中，这样更改就会生效-->
    <link rel="stylesheet" href="{{asset('adminlte/css/skins/skin-blue.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <!--<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>-->
    <!--<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>-->
    {{--<![endif]-->--}}

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
应用一个或多个以下类来获得
预期的效果
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('Liang::adminlte.header')

    @include('Liang::adminlte.sidebar')



    <!-- Content Wrapper. Contains page content 内容包装器。包含页面内容-->
    <div class="content-wrapper" id="admin-content">

        <!-- Content Header (Page header) -->
        {{--<section class="content-header">--}}
            {{--<h1>--}}
                {{--页眉--}}
                {{--<small>描述(可选)</small>--}}
            {{--</h1>--}}
            {{--<ol class="breadcrumb">--}}
                {{--<li><a href="{{route('manage.index')}}"><i class="fa fa-dashboard"></i> 首页 </a></li>--}}
                {{--@yield('breadcrumbs')--}}
            {{--</ol>--}}
        {{--</section>--}}

        {{--<!-- Main content -->--}}
        {{--<section class="content container-fluid" id="sd">--}}

            {{--<a href="aa" class="ajaxa">W3School</a>--}}
            {{--<!----------------------------}}
              {{--| Your Page Content Here |--}}
              {{---------------------------->--}}
            {{--@yield('content',"默认主页")--}}

        {{--</section>--}}

        <!-- /.content -->
        @include('Liang::layouts.massage')
        @include('Liang::adminlte.main')
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar  控制栏-->
    <div class="myadmin">
    @include('Liang::adminlte.aside')
    </div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS必需的JS脚本 -->

<!-- jQuery 3 -->
<script src="{{asset('adminlte/js/jquery.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('adminlte/js/bootstrap.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte/js/adminlte.js')}}"></script>
<script src="{{asset('js/Chart.js')}}"></script>
<script src="{{asset('js/myjs.js')}}"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.此外，您还可以添加“瘦身”和“快速点击”插件。
     Both of these plugins are recommended to enhance the
     user experience.这两种插件都被推荐用于增强
用户体验。 -->
<script>

    $(function () {
        @stack('script')
    });
</script>

</body>
</html>