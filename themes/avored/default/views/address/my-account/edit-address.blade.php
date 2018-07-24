@extends('layouts.app')

@section('meta_title','Edit Address List Account E commerce')
@section('meta_description','Edit Address List Account E commerce')



@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-3">
                @include('user.my-account.sidebar')
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">修改地址</div>
                    <div class="card-body">
                        <form action=" {{ route('my-account.address.update',  $model->id) }}" method="post">
                            @method("put")
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

                                        <label for="country" class="control-label">国家</label>
                                        <select name="country_id"
                                                @if($errors->has('country_id'))
                                                class="is-invalid form-control"
                                                @else
                                                class="form-control"
                                                @endif
                                        >
                                            @foreach($countries as $countryId => $countryName)
                                                <option @if($model->country_id == $countryId)
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
                                    @include('partials.forms.text',['name' => 'postcode','label' => 'Post Code'])
                                </div>
                            </div>

                            @include('partials.forms.text',['name' => 'phone','label' => 'Phone'])


                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">修改地址</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
