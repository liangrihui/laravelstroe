<?php
$item=0;
?>
<ul class="nav nav-tabs">
    @foreach($explain as $code=>$blood)
        <?php
        $item +=1;
        ?>
        @if($item ==12)
            <li><a href="#"><em class="dongz text-red"  style="font-size: x-small">展开或收缩</em> <i class="fa  fa-long-arrow-down"></i></a></li>
            <div class="yinchang" style="display: none">
                <ul class="nav nav-tabs">
                    @else
                        <li class="col-md-2"><a href="#" data-route="{{route("manage.chart_data",["table"=>$table,"column"=>$code])}}" onclick="getChartData(this)"   data-max="{{$blood['refer_max']}}"  data-min="{{$blood['refer_min']}}" data-column="{{$code}}" data-unit="{{$blood['unit']}}">{{$blood['name']}}</a></li>
                    @endif
                    @endforeach
                    @if($item>12)
                </ul>
            </div>
        @endif
</ul>