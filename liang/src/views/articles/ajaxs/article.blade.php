@extends('Liang::layouts.ajax')

@section('title')
    文章列表
@endsection

@section('breadcrumbs')
    <li>文章列表</li>
    @endsection

@section('content')
    <p><a href="{{url('manage/article/create')}}" class="ajaxa"><button class="btn btn-primary">新建文章</button></a></p>
    <div class="panel panel-default">
        <div>
            <table class="table table-hover">
                <thead>
                <tr class="bg-warning">
                    <th>ID</th>
                    <th>标题</th>
                    <th>状态</th>
                    <th>作者</th>
                    <th>创建时间</th>
                    <th>&nbsp;操作</th>
                </tr>
                </thead>
                <tbody class="articles">
                @foreach($articles as $article)
                    <tr>
                        <th scope="row">{{$article->id}}</th>
                        <td>{{$article->title}}</td>
                        <td>{{$article->status==10?'发布':'草稿'}}</td>
                        <td>{{$article->user->last_name}}</td>
                        {{--<td>{{date('Y-m-d H:i:s',$article->created_at)}}</td>--}}
                        <td>{{$article->created_at->format('Y-m-d')}}</td>
                        <td>
                            <a href="{{url('manage/article/update',['id'=>$article->id])}}" class="ajaxa">查看修改</a>
                            <a href="{{route('blog.delete',['id'=>$article->id,'tag'=>$article->tags,'type'=>'ajax'])}}" class="ajaxa" onclick="if(confirm('你确定删除这篇《 {{$article->title}} 》文章吗？') == false) return false">删除</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>


        </div>

        <div class="text-center">
            <?php echo $page;?>
            {{--{{$articles->links()}}--}}
            {{--{{$articles->render()}}--}}
        </div>


    </div>


@endsection


