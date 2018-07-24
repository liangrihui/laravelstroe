@extends('Liang::layouts.ajax')

@section('title')
    尿常规
@endsection

@section('breadcrumbs')
    <li>尿常规</li>
@endsection

@section('content')
    @include('Liang::layouts.massage')
    @include('Liang::bodys.check_item',['table'=>'piss','explain'=>$piss_explain])

    <div class="row">
        @include('Liang::bodys.chart',['table'=>'piss'])

        @include('Liang::bodys.right',['new_check'=>$new_check,'explain'=>$piss_explain])
    </div>

@endsection