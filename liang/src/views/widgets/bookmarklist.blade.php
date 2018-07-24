@foreach($bookmarks as $bookmark)
    @if($bool)
        <div class="row">
            <div class="col-md-5" style="margin-left: 20px;">
                {{--<img src="{{$bookmark->img}}">--}}
                <a href="{{$bookmark->url}}" target="_blank">{{$bookmark->name}}</a>
                <a href="{{route('manage.bookmark.delete',['id'=>$bookmark->id])}}" class="ajaxa" style="color: #ac2925" > 删除</a>
            </div>
            @php
                $bool = false;
            @endphp
            @else
                <div class="col-md-5">
                    {{--<img src="{{$bookmark->img}}">--}}
                    <a href="{{$bookmark->url}}" target="_blank">{!! $bookmark->name !!}</a>
                    <a href="{{route('manage.bookmark.delete',['id'=>$bookmark->id])}}"  style="color: #ac2925" class="ajaxa"> 删除</a>
                </div>
        </div>
        @php
            $bool = true;
        @endphp
    @endif
@endforeach