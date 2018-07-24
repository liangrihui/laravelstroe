@extends('Liang::layouts.ajax')

@section('title')
    查看和修改 {{$article->title}}
@endsection

@section('breadcrumbs')
    <li><a href="{{route('manage.article')}}" class="ajaxa">文章列表</a></li>
    <li>{{$article->title}}</li>
@endsection

@section('content')
    {{--<h2 style="color: #00a7d0"><strong>{{$article->title}}</strong></h2>--}}

    {{--<div class="row">--}}
        {{--<div class="col-md-8"><i class="glyphicon glyphicon-user"></i> {{$article->user->last_name}} 最后修改: {{$article->updated_at}}</div>--}}
        {{--<div class="col-md-4"><i class="glyphicon glyphicon-tags"></i> 标签 : {{$article->tags}}</div>--}}
    {{--</div><br>--}}

    {{--<pre>--}}
         {{--{{ htmlspecialchars_decode($article->content)}}--}}
        {{--{!! $article->content !!}--}}
    {{--</pre>--}}
    <div class="create-article">
        <form class="myform" onsubmit="return false" action="{{route('blog.article.store')}}">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="title" placeholder="文章标题" value="{{$article->title}}" required="required">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="tags" placeholder="标签" value="{{$article->tags}}" required="required">
            </div>
            <div class="form-group">
                <input type="hidden" name="id" value="{{$article->id}}">
                <input type="hidden" name="type" value="ajax">
                <textarea class="form-control" rows="20" required="required" name="content">{{$article->content}}</textarea>

            </div>
            <button type="submit" class="btn btn-primary" onclick="submitForm()"> 保存文章 </button>
        </form>

    </div>
@endsection