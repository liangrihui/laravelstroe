@extends('layouts.app')

@section('meta_title','我的账户')
@section('meta_description','我的账户')


@section('content')

    <div class="row profile">
        <div class="col-3">
            @include('user.my-account.sidebar')
        </div>
        <div class="col-9">

            <div class="card">
                <div class="card-header">
                    个人基本信息
                </div>
                <div class="card-body">

                    <div class="table-responsive" >
                    <table class=" table">
                        <tbody>
                        <tr>
                            <th>姓</th>
                            <td> {{ $user->first_name }}</td>
                        </tr>
                        <tr>
                            <th>名</th>
                            <td> {{ $user->last_name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td> {{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>联系电话</th>
                            <td> {{ $user->phone }}</td>
                        </tr>
                        <tr>
                            <th>公司</th>
                            <td> {{ $user->company_name }}</td>
                        </tr>

                        </tbody>


                    </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
