@extends('Liang::layouts.ajax')

@section('title')
    管理{{$title}}书签
    @endsection

@section('breadcrumbs')
    <li>学习书签</li>
    @endsection

@section('content')

    <div class="row">
        @include('Liang::widgets.bookmarkhead',['type'=>$type])
        @if(session()->has('results'))
            <h2>{{session()->get('results')}}</h2>
        @endif
    </div>
        @include('Liang::widgets.bookmarklist',['bookmarks'=>$bookmarks,'bool'=>$bool])

    @endsection
