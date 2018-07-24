<!-- Left side column. contains the logo and sidebar 左列。包含logo和侧边栏 -->
<aside class="main-sidebar">
{{--{{dd($menu)}}--}}
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('adminlte/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                @if(Auth::check())
                    <p>{{Auth::user()->last_name}}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
                    @endif
                <p>皮尔斯</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">菜单选项</li>
            <!-- Optionally, you can add icons to the links -->

            @foreach($menu as $menus)
                {{--{{dd($menus->children())}}--}}
                @if($menus->children()->isEmpty())
                    <li class="menu{{$menus->id}}"><a href="#" onclick="
                        $.get('{{route($menus->route)}}',function (data) {
                        $('#admin-content').html(data);
                        });
                        $('.menu{{$menus->id}}').addClass('active')
                "><i class="fa fa-pie-chart"></i> <span>{{$menus->name}}</span></a></li>
                    @else
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-link"></i> <span>{{$menus->name}}</span>
                            <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                        </a>
                        <ul class="treeview-menu">
                            @foreach($menus->children() as $child)

                            <li class="menu{{$child->id}}"><a href="#" onclick="

                                        $.get('{{route($child->route,['type'=>$child->id])}}',function (data) {
                                        $('#admin-content').html(data);
                                        });
                                        $('.menu{{$child->id}}').addClass('active')
                                        ">{{$child->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    @endif
                @endforeach

        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>

<script>
    @push('script')

    @endpush

</script>