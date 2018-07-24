<hr>
<div class="row" >
    <div class="col-md-2" style="min-height: 120px;background-color: #FFFFF0;text-align: center;">
    <img src="{{asset('img/20170522_181850719.jpg')}}" style="width: 40px;height: 40px;">
        <p>{{$comment->user->last_name}}</p>
    </div>
    <div class="col-md-10">
        <div style="min-height: 80px;">
            {{$comment->content}}
        </div>

        <div style="text-align: right">
            回复时间 : {{$comment->created_at}}
        </div>
    </div>
</div>