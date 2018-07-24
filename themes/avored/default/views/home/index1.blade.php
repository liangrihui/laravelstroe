@extends('layouts.app')

@php

    $metaTitle = (!is_null($pageModel) && $pageModel->meta_title != "") ? $pageModel->meta_title : "Home Page";
    $metaDescription = (!is_null($pageModel) && $pageModel->meta_description != "") ? $pageModel->meta_description : "Home Page";

@endphp


@section('content')
    <div class="container">
        <div class="row">

        </div>
        <div class="row">
            <div class="col-12" style="min-height: 450px">
                {{--<a class="nav-link" href="{{route('home1')}}"><img style="width: 15px;height: 15px;" src="{{asset('cartss.png')}}"> 购物商城</a>--}}

            </div>
        </div>
    </div>
@endsection
