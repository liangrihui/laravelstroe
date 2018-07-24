@extends('Liang::layouts.app')

@section('breadcrumbs')
    <li>文章列表</li>
    @endsection

@section('content-left')
    @if(Auth::check())
        <a href="{{route('blog.article.create')}}" style="color: #ffffff"><button class="btn btn-success"><strong>新建文章</strong></button></a>
    @else
        <em style="color: #00a7d0;padding-right: 30px;">新建文章需要登录</em><a class="btn btn-primary" href="{{route('blog.login')}}" style="width: 90px;">登录</a>
    @endif



    @foreach($articles as $article)
        <div>
            <h2><a href="{{route('blog.article.show',['id'=>$article->id])}}">{{$article->title}}</a></h2>
            <div>
                <i class="glyphicon glyphicon-user"></i><em>{{$article->user->last_name}} &nbsp; 创建于:{{$article->created_at}}</em>&nbsp;&nbsp;&nbsp;&nbsp;<br>
                <p>{{$article->sub_content}}</p>
            </div>
            <div class="tags">
                <i class="glyphicon glyphicon-tags"></i> 标签 :
                @foreach($article->tag_array as $tag)
                    <a href="{{route('blog.search',['search'=>$tag])}}">{{$tag}}</a>
                    @endforeach
            </div>
            <div class="comment">
            <a href="#"> 评论({{$article->article_comment}}) </a>
                @if($article->article_comment>0)
                最新评论 : {{$article->new_comment}}
                    @endif
            </div>
            <a href="{{route('blog.delete',['id'=>$article->id,'tag'=>$article->tags])}}" style="color: #ac2925;" onclick="return confirm('你确定要删除吗？')" >删除</a>
        </div>

    @endforeach
    {{$articles->links()}}


    @endsection