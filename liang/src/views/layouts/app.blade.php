<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>梁日辉博客论坛</title>

<link rel="stylesheet" href="{{asset('css/mycss.css')}}">
<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
@stack('styles')
</head>
<body>

<div class="container" style="min-height: 800px;">
    @include('Liang::layouts.nva')
    <br><br><br>
    <div class="row">
        <div class="col-md-9">
            <div>
                <ol class="breadcrumb">
                    <li><a href="{{route('home')}}">首页</a></li>
                    @yield('breadcrumbs')
                </ol>
            </div>
            <div class="row">
                <div class="col-12">
                    @if(session()->has('massages'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>

                            <strong> 成功!</strong> {{ session()->get('massages') }}

                        </div>
                    @endif
                </div>
            </div>
            @yield('content-left')
        </div>
        <div class="col-md-3">
        @include('Liang::articles.right')
            @yield('content-right')
        </div>

    </div>
    @yield('content')


</div>
@include('Liang::layouts.footer')
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/jquery.min.js')}}"></script>
@stack('scripts')
</body>
</html>