<div class="col-md-2">
    <div>
        <a class="ajaxa btn btn-primary btn-lg" href="{{route('manage.upload.image')}}">上传检查单</a>
    </div>
    <br>
    <div class="box box-solid bg-light-blue-gradient">
        <div class="box-header">

            <div class="box-title"><i class="fa fa-map-marker"></i> 上次检查情况</div>
        </div>
        <div class="box-body" style="min-height: 350px;">

                @foreach( $explain as $key => $value)
                    @if($new_check->$key > $value['refer_max'] || ($new_check->$key < $value['refer_min'] && $new_check->$key != ''))
                        <p style="color: #ac2925">{{$value['name']}} 异常 : {{$new_check->$key}}</p>
                        @endif
                    @endforeach

        </div>
    </div>
</div>