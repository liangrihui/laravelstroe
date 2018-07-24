@extends('layouts.app')

@section('meta_title')
    {{ $category->name }}
@endsection

@section('content')
    <div class="row">
        <div class="col-2">
            @include('category.options')
        </div>
        <div class="col-10">
            <div class="row">
                @if(count($category->products) <= 0)
                    <p>抱歉没有找到产品</p>
                @else

                    @foreach($products as $product)
                        <div class="col-4">
                            {{--{{$product->category->name}}--}}
                            {{--{{dd( $product)}}--}}
                            @include('product.view.product-card',['product' => $product])
                        </div>
                    @endforeach
                    <div class="clearfix"></div>


                @endif
            </div>
            <br>
            <div class="row">
                <div class="text-center">
                    {!!  $products->links('pagination.bootstrap-4') !!}
                </div>
            </div>
        </div>



    </div>
@endsection
