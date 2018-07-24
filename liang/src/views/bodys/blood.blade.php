@extends('Liang::layouts.ajax')

@section('title')
    血常规图表
@endsection

@section('breadcrumbs')
    <li>血常规</li>
@endsection

@section('content')
    {{--@include('Liang::layouts.massage')--}}
    @include('Liang::bodys.check_item',['table'=>'blood','explain'=>$blood_explain])

    <div class="row">
        @include('Liang::bodys.chart',['table'=>'blood'])

        @include('Liang::bodys.right',['new_check'=>$new_check,'explain'=>$blood_explain])

    </div>


    @endsection

