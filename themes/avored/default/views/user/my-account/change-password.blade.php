@extends('layouts.app')

@section('meta_title','修改密码')
@section('meta_description','修改密码')


@section('content')
    <div class="row profile">
        <div class="col-md-3">
            @include('user.my-account.sidebar')
        </div>
        <div class="col-md-9">

            <div class="card">
                <div class="card-header">
                    更改密码
                </div>
                <div class="card-body">

                    <form action="{{ route('my-account.change-password.post') }}" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label>当前的密码</label>
                            <input type="password" name="current_password"

                                   @if($errors->has('current_password'))
                                   class="is-invalid form-control"
                                   @else
                                   class="form-control"
                            @endif
                            />
                            @if ($errors->has('current_password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('current_password') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>新密码</label>
                            <input type="password" name="password"
                                    @if($errors->has('password'))
                                        class="is-invalid form-control"
                                    @else
                                    class="form-control"
                                    @endif
                            />
                            @if ($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>确认密码</label>
                            <input type="password" name="password_confirmation"
                                   @if($errors->has('password_confirmation'))
                            class="is-invalid form-control"
                                   @else
                                   class="form-control"
                                    @endif
                            />
                            @if ($errors->has('password_confirmation'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password_confirmation') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">更改密码</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

@endsection
