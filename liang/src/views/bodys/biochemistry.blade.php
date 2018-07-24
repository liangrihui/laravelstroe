@extends('Liang::layouts.ajax')

@section('title')
    生化 34 项图表
@endsection

@section('breadcrumbs')
    <li>生化 34 项</li>
@endsection

@section('content')
    @include('Liang::layouts.massage')
    @include('Liang::bodys.check_item',['table'=>'biochemistry','explain'=>$biochemistry_explain])

    <div class="row">
        @include('Liang::bodys.chart',['table'=>'biochemistry'])

        @include('Liang::bodys.right',['new_check'=>$new_check,'explain'=>$biochemistry_explain])

    </div>

    @endsection