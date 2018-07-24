
@extends('Liang::layouts.app')

@section('breadcrumbs')
    <li><a href="{{route('blog.index')}}">文章列表</a></li>
    <li>{{$article->title}}</li>
    @endsection

@section('content-left')
    <h2 style="color: #00a7d0"><strong>{{$article->title}}</strong></h2>

    <div class="row">
        <div class="col-md-8"><i class="glyphicon glyphicon-user"></i> {{$article->user->last_name}} 最后修改: {{$article->updated_at}}</div>
        <div class="col-md-4"><i class="glyphicon glyphicon-tags"></i> 标签 : {{$article->tags}}</div>
    </div><br>

    <pre>
         {{--{{ htmlspecialchars_decode($article->content)}}--}}
        {!! $article->content !!}
    </pre>

    @foreach($article->comment as $comment)
        @include('Liang::articles.comment',['comment'=>$comment])
    @endforeach
    <hr>

    @if(Auth::check())
        <div role="form">
            <form action="{{route('blog.save.comment')}}" method="POST">
                @csrf
                发表评论:<br><br>
                <input type="hidden" name="user_id" value="{{Auth::id()}}">
                <input type="hidden" name="status" value="2">
                <input type="hidden" name="article_id" value="{{$article->id}}">
                <textarea rows="4" class="form-control" name="content"></textarea><br>
                <button class="form-group btn btn-primary" type="submit"> 发表评论</button>
            </form>
            <br><br><br>
        </div>
    @else
        <div><h3>需要<a href="{{route('blog.login')}}"><button class="btn btn-primary">登录</button></a>才能评论</h3></div>
    @endif

    @endsection