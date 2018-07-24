@extends('Liang::layouts.ajax')

@section('title')
    上传您的检查单
    @endsection
@section('breadcrumbs')
    <li>上传图片</li>
    @endsection

@section('content')
    @include('Liang::widgets.upload')

    @if(isset($result))
        <div class="text-center"><h3>识别结果</h3></div>
        <div class="row">
            <div class="col-md-6">
                <img src="{{asset($tupian)}}" style="width: 500px;" onmouseover="jQuery(this).css('width',800);" onmouseout="jQuery(this).css('width',500);">
            </div>


            <div class="col-md-6">
               <div class="row">

                   <form action="{{route('manage.check.store')}}" class="form-horizontal myform" onsubmit="return false">
                    @csrf
                       <input type="hidden"  name="type" value="{{$type}}">
                   @foreach ($result as $kay=>$value)
                    <div class="form-group">
                        <label class="col-sm-4 control-label">{{$value[0]??''}}</label>
                        <div class="col-sm-6">
                            @if($kay == 'check_time')
                                <input type="date" name="{{$kay}}" class="form-control" value="{{$value[1]??""}}" placeholder="未能识别" required id="checkTime"> </div>
                            @elseif(isset($value[1]))
                                <input type="text" name="{{$kay}}" class="form-control" value="{{$value[1]}}" placeholder="未能识别"> </div>
                           <div class="col-sm-2  text-red">最新:{{$new_check->$kay}}</div>
                                @else
                                <input type="text" name="{{$kay}}" class="form-control" value="" placeholder="未能识别"> </div>
                            <div class="col-sm-2 text-red">最新:{{$new_check->$kay}}</div>
                            @endif



                    </div>
                       @endforeach
                       <div class="form-group">
                           <div class="col-sm-offset-4 col-sm-5"></div>
                           <button type="submit" class="btn btn-primary" onclick="submitForm()">保存</button>
                       </div>

                   </form>
               </div>
            </div>


    @endif
    @endsection