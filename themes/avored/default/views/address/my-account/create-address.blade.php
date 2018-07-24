@extends('layouts.app')

@section('meta_title','创建地址')
@section('meta_description','创建地址')

@section('content')

    <div class="row mt-3">
        <div class="col-md-3">
            @include('user.my-account.sidebar')
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    创建地址
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('my-account.address.store') }}">
                        @csrf


                        <div class="row">
                            <div class="col-6">
                                @include('partials.forms.text',['name' => 'first_name','label' => '姓'])
                            </div>
                            <div class="col-6">
                                @include('partials.forms.text',['name' => 'last_name','label' => '名'])
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                @include('partials.forms.text',['name' => 'province','label' => '省份'])
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-6">
                                @include('partials.forms.text',['name' => 'city','label' => '城市'])

                            </div>
                            <div class="col-6">
                                @include('partials.forms.text',['name' => 'state','label' => '街道'])
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">

                                    <label for="country" class="control-label"> 国家</label>
                                    <select name="country_id"
                                            @if($errors->has('country_id'))
                                            class="is-invalid form-control"
                                            @else
                                            class="form-control"
                                            @endif
                                    >
                                        @foreach($countries as $countryId => $countryName)
                                            <option @if(150 == $countryId)
                                                    {{ "selected" }}
                                                    @endif
                                                    value="{{ $countryId }}">{{ $countryName }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('country_id'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('country_id') }}
                                        </div>
                                    @endif


                                </div>
                            </div>
                            <div class="col-6">
                                @include('partials.forms.text',['name' => 'postcode','label' => '邮编'])
                            </div>
                        </div>

                        @include('partials.forms.text',['name' => 'phone','label' => '联系电话'])

                        <div class="form-group">
                            <label for="phone" class="control-label">地址类型</label>

                            <select name="type"
                                    @if($errors->has('type'))
                                    class="is-invalid form-control"
                                    @else
                                    class="form-control"
                                    @endif
                            >
                                <option value="SHIPPING">送货地址</option>
                                <option value="BILLING">默认地址</option>
                            </select>


                            @if ($errors->has('type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('type') }}
                                </div>
                            @endif
                        </div>


                        <div class="form-group">
                            <button class="btn btn-primary" type="submit" name="create_address" value="">
                                创建地址
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
