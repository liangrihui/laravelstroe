<div class="row">
    <div class="col-md-5 text-center">
        <form class="myform form-inline addBookmark" action="{{route('manage.bookmark.add')}}" onsubmit="return false">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="url" placeholder="复制网址到这里">
                <input type="hidden" name="type" value="{{$type}}">
            </div>
            <button type="submit"  onclick="submitForm()" class="btn btn-success">添加书签</button>
        </form>
    </div>

    <div class="col-md-5 text-center">
        <form class="searchBookmark form-inline searchBookmark" action="#" onsubmit="return false">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="search" placeholder="输入你想查询的网址">
                <input type="hidden" name="type" value="{{$type}}">
            </div>
            <button type="submit" onclick="searchbookmark()" class="btn btn-primary">查询书签</button>
        </form>
    </div>
</div>