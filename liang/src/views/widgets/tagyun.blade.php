<div style="min-width: 270px;">
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="glyphicon glyphicon-tags"></i> 标签云
        </div>
        <div class="panel-body" style="min-height: 100px;">
            @foreach($tags as $tag)
                @if($tag->frequency > $avg * 1.7)
                    <a href="{{route('blog.search',['search'=>$tag->name])}}"><h2 style="display: inline-block"><span class="label label-success">{{$tag->name}}</span></h2> </a>
                    @elseif($tag->frequency > $avg)
                    <a href="{{route('blog.search',['search'=>$tag->name])}}"><h3 style="display: inline-block"><span class="label label-warning">{{$tag->name}}</span></h3> </a>
                    @else
                    <a href="{{route('blog.search',['search'=>$tag->name])}}"><h4 style="display: inline-block"><span class="label label-info">{{$tag->name}}</span></h4></a>
                    @endif
                @endforeach
        </div>

    </div>
</div>