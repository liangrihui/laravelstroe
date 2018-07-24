<div class="card">
    <div class="card-body" style="height: 500px;">

        <a href="{{ route('product.view', $product->slug)}}" title="{{ $product->name }}">
            @include('product.view.product-image',['product' => $product])
        </a>

        <div class="caption">
            <h4>
                <a href="{{ route('product.view', $product->slug)}}" class="product-name"
                   title="{{ $product->name }}">
                    {{ $product->name }}
                </a>
            </h4>

            <p class="product-price">
                $ {{ number_format($product->price,2) }}
            </p>

            <div>

                @if($product->canAddtoCart())
                <form method="post" action="{{ route('cart.add-to-cart') }}">
                    {{ csrf_field() }}


                <input type="hidden" name="slug" value="{{ $product->slug }}"/>

                <div class="product-stock">有存货</div>

                    <hr style="margin-top: 50px;">
                <div class="clearfix"></div>

                <div class="float-left" style="margin-right: 5px;">
                    <button type="submit" class="btn btn-primary"
                            href="{{ route('cart.add-to-cart', $product->id) }}">
                        放入购物车
                    </button>
                </div>
                </form>

                @else
                    <div class="product-stock text-danger ">缺货</div>
                    <hr>

                    <div class="clearfix"></div>
                    <div class="float-left" style="margin-right: 5px;">
                        <button type="button" disabled class="btn btn-default">
                            加入购物车
                        </button>
                    </div>
                @endif

                @if(Auth::check() && Auth::user()->isInWishlist($product->id))
                    <a class="btn btn-danger" title="Remove from Wish List"
                       data-toggle="tooltip" href="{{ route('wishlist.remove', $product->slug) }}">
                        <i
                                class="fa fa-heart"></i></a>
                @else
                    <a class="btn btn-success" title="Add to Wish List" data-toggle="tooltip"
                       href="{{ route('wishlist.add', $product->slug) }}"><i class="fa fa-heart"></i></a>
                @endif
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
@endpush