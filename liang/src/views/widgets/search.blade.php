<div style="min-width: 290px;">
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="glyphicon glyphicon-search"></i> 查询
        </div>
        <div class="panel-body" style="min-height: 100px;">
            <form method="post" action="{{route('blog.search')}}" class="form-inline">
                @csrf
            <input type="text" name="search" class="form-control" placeholder="输入你要查询的内容">
                <button type="submit" class="btn btn-success">查询</button>
            </form>
        </div>

    </div>
</div>