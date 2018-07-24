@extends('layouts.app')

@section('meta_title','编辑我的帐户资料')
@section('meta_description','编辑我的帐户资料')


@section('content')

        <div class="row profile">

            <div class="col-3">
                @include('user.my-account.sidebar')
            </div>
            <div class="col-9">
                <div class="card">
                    <div class="card-header">
                        编辑基本资料
                    </div>
                    <div class="card-body">
                        <div class="profile-content">

                            <form method="post" action="{{ route('my-account.store') }}">

                                @csrf

                                @include('partials.forms.text',['name' => 'first_name','label' => '姓','model' => $user])
                                @include('partials.forms.text',['name' => 'last_name','label' => '名','model' => $user])
                                @include('partials.forms.text',['name' => 'email','label' => 'Email','model' => $user,
                                                        'attributes' => ['disabled' => true,'class' => 'form-control']])


                                @include('partials.forms.text',['name' => 'phone','label' => '联系电话','model' => $user])
                                @include('partials.forms.text',['name' => 'company_name','label' => '工作情况','model' => $user])




                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary"> 更新个人资料</button>

                                </div>


                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>

@endsection
