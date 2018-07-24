@extends('layouts.app')

@section('meta_title','我的地址列表')
@section('meta_description','我的地址列表')

@section('content')
        <div class="row profile">
            <div class="col-md-3">
                @include('user.my-account.sidebar')
            </div>

            <div class="col-9">
                <div class="main-title-wrap mb-3">
                    <span class="h1">地址</span>

                    <div class="float-right mr-3">
                        <a class="btn btn-primary" href="{{ route('my-account.address.create')}}">创建地址</a>
                    </div>

                </div>
                @if(count($addresses) <= 0)
                    <p>抱歉您还没设置地址</p>
                @else
                    <div class="row">
                        @foreach($addresses as $address)

                            <div class="col-6 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        @if($address->type == "SHIPPING")
                                            <span>配送地址</span>
                                        @else
                                            <span>默认地址</span>
                                        @endif
                                        <span class="float-right">
                                            <a href="{{ route('address.destroy', $address->id)}}"> 删除 </a>
                                        </span>

                                        <span class="float-right">
                                            <a href="{{ route('my-account.address.edit', $address->id)}}"> 编辑&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a>
                                        </span>


                                    </div>
                                    <div class="card-body ">
                                        <table class="table table-responsive">
                                            <tbody>
                                            <tr>
                                                <th>姓</th>
                                                <td> {{ $address->first_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>名</th>
                                                <td> {{ $address->last_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>省份</th>
                                                <td> {{ $address->province}}</td>
                                            </tr>


                                            <tr>
                                                <th>城市</th>
                                                <td> {{ $address->city}}</td>
                                            </tr>
                                            <tr>
                                                <th>街道</th>
                                                <td> {{ $address->state}}</td>
                                            </tr>
                                            <tr>
                                                <th>国家</th>
                                                <td> {{ $address->country->name}}</td>
                                            </tr>
                                            <tr>
                                                <th>联系电话</th>
                                                <td> {{ $address->phone }}</td>
                                            </tr>

                                            </tbody>


                                        </table>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                @endif
            </div>
        </div>

@endsection
