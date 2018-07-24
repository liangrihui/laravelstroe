<div class="row">
    <div class="col-6 text-center">
        @if(session()->has('massages'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>

                <strong> 成功!</strong> {{ session()->get('massages') }}

            </div>
        @endif
    </div>
</div>
<section class="content-header">
    <h1 style="color: #00a65a;">
        @yield('title')
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('manage.index')}}"><i class="fa fa-dashboard"></i> 首页 </a></li>
        @yield('breadcrumbs')
    </ol>
</section>
<br><br>
<section class="container container-fluid">
    @yield('content')
</section>