@extends('Liang::layouts.ajax')

@section('title')
    创建文章
@endsection

@section('breadcrumbs')
    <li><a href="{{route('manage.article')}}" class="ajaxa">文章列表</a></li>
    <li>新建文章</li>
@endsection

@section('content')
    <div class="create-article" >
        <form action="{{route('blog.article.store')}}" class="myform" onsubmit="return false">
            @csrf
            <div class="form-group">
                <label for="title">文章标题</label>
                <input type="text" class="form-control" name="title" placeholder="文章标题" value="{{old('title')}}" required="required">
            </div>
            <div class="form-group">
                <label for="tag">文章主题标签</label>
                <input type="text" class="form-control" name="tags" placeholder="标签" value="{{old('tag')}}" required="required">
            </div>
            <div class="form-group">
                <label for="content">内容</label>
                <textarea class="form-control" rows="20" required="required" name="content">{{old('content')}}</textarea>
                <input type="hidden" name="created_by" value="{{Auth::id() ? :5}}">
                <input type="hidden" name="status" value="2">
                <input type="hidden" name="create">
            </div>
            <button type="submit" class="btn btn-primary" onclick="submitForm()"> 保存文章 </button>
        </form>

    </div>
    @endsection