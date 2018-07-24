<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--<title>{{ config('app.name', 'AvoRed Ecommerce') }}</title>--}}
    <title>梁日辉--管理后台</title>
    {{--<link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">--}}
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('vendor/avored-admin/css/app.css') }}" rel="stylesheet">


    <!-- Scripts -->
    <script>
        window.Laravel = <?php
        echo json_encode([
                'csrfToken' => csrf_token(),
        ]);
        ?>
    </script>
    @stack('styles')
</head>
<body>




<aside class="sidebar">
    @include("avored-ecommerce::layouts.left-nav")
</aside>
<div class="main-content">

    @include("avored-ecommerce::layouts.nav")


    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @if(session()->has('notificationText'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>

                        <strong> 成功!</strong> {{ session()->get('notificationText') }}

                    </div>
                @endif
            </div>
        </div>
        {!! Breadcrumb::render(Route::getCurrentRoute()->getName()  ) !!}

        <div style="min-height: 500px;" id="shuaxin">
            @yield('content')
        </div>

    </div>

    @include('avored-ecommerce::layouts.footer')
</div>



<script src="{{ asset('vendor/avored-admin/js/app.js') }}"></script>
@stack('scripts')
<script>
    $(function () {
    $("#te").click(function () {
        $.get("{{url('admin/product')}}",function (data) {
            $('.main-content').html(data);
        });

    });
    {{--$('#project').change(function() {--}}
        {{--$.post("{{ url('key/klist') }}/"+$('#project').val(),     // 路由为Route::any('/key/klist/{project_id}')  --}}
                {{--{'_token': '{{ csrf_token() }}'}, function(data) {--}}
                    {{--$('#body').html(data);--}}
                {{--});--}}
        {{--});--}}
//    ('.tea-consumption').on('click', '#my-button', function() {
//        $.ajax({
//            method: 'DELETE',
//            url: '/teas/consumption/' +　$('this').next('input').val() + '/delete',
//            success: function( id ) {
//                var sel = $('#tea-card-' + id);
//                sel.remove();
//            }
//        });
//    });
    })

</script>

</body>
</html>
