@include('Liang::layouts.massage')

<div class="container">
    {{--图片轮播--}}
    <div >
        <br>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner " role="listbox">
                <div class="item active">
                    <img src="{{asset('img/1.jpg')}}" style="padding-left: 30%;" alt="...">
                </div>
                <div class="item">
                    <img src="{{asset('img/2.jpg')}}" style="padding-left: 30%;" alt="...">
                </div>
                <div class="item">
                    <img src="{{asset('img/3.jpg')}}"  style="padding-left: 30%;" alt="...">
                </div>
                <div class="item">
                    <img src="{{asset('img/4.jpg')}}" style="padding-left: 30%;"  alt="...">
                </div>
                {{--<div class="item">--}}
                {{--<img src="..." alt="...">--}}
                {{--<div class="carousel-caption">--}}
                {{--...--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--...--}}
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">上一张</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">下一张</span>
            </a>
        </div>
    </div>
    {{--可以编辑的选项--}}
    <div class="panel-group" id="accordion">
        <br>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion"
                       href="#collapseOne">
                        添加菜单和修改菜单
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse">
                <div class="panel-body">
                    <form onsubmit="return false" action="{{route('manage.addMenu')}}" class="myform form-inline">
                        @csrf

                        <div class="form-group">
                            <label for="菜单名字">菜单名</label>
                            <input type="text" name="name" class="form-control" placeholder="输入菜单名字" required="required">
                        </div>
                        <div class="form-group">
                            <label for="parentMenu">父类菜单</label>
                            <select class="form-control" name="parent_id">
                                <option value="0">默认为一级菜单</option>
                                @foreach($allmenu as $menu)
                                    <option value="{{$menu->id}}">{{$menu->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-primary" type="submit" onclick="submitForm()">保存</button>
                    </form>
                    <br><br>

                    <div class="row menulist">
                        <h3>菜单列表</h3>
                        <table class="col-md-8 col-md-offset-1 table-hover">
                            <thead>
                            <tr>
                                <th class="col-md-2">id</th>
                                <th class="col-md-3">菜单名</th>
                                <th class="col-md-4 text-center">路由</th>
                                <th class="col-md-2 text-center">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <br>
                            @foreach($allmenu as $menu)
                            <tr>
                                <td class="col-md-2">
                                  {{$menu->id}}
                                </td>
                                <td class="col-md-3">
                                    {{$menu->name}}
                                </td>
                                <td class="col-md-4">
                                <input type="text" class="form-control myinput" value="{{$menu->route}}" placeholder="一级菜单" title="路由"></span>
                                </td>
                                <td class="col-md-2 text-center">
                                    <a href="#" data-value="{{$menu->route}}" data-id="{{$menu->id}}" data-url="{{route('manage.menu.update')}}" class="updateMenu" data-token="{{csrf_token()}}" onclick="myupdate(this)"> 修改 </a>
                                    <a href="{{route('manage.menu.delete',['id'=>$menu->id])}}" class="mydelete"> 删除 </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion"
                       href="#collapseTwo">
                        添加用户
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                    Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                    cred nesciunt sapiente ea proident. Ad vegan excepteur butcher
                    vice lomo.
                </div>
            </div>
        </div>
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion"
                       href="#collapseThree">
                        梁日辉是帅哥
                    </a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">
                    Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                    cred nesciunt sapiente ea proident. Ad vegan excepteur butcher
                    vice lomo.
                </div>
            </div>
        </div>
    </div>
</div>