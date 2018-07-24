
{{--<form method="post" id="cart-form-update" action="{{ route('cart.update') }}">--}}

    {{--@csrf--}}
    {{--@method('put')--}}


        <tr>

            <td class="col-6">
                <div class="media">
                    <img alt="{{ $product->name() }}"
                         class="d-flex mr-3"
                         style="height: 72px;"

                         src="{{ $product->image()->other_path->smallUrl }}"/>


                    <div class="media-body">
                        <h4 class="media-heading">
                            <a href="{{ route('product.view', $product->slug())}}">
                                {{ $product->name() }}
                            </a>
                        </h4>

                        <p>状态: <span class="text-success"><strong>有存货</strong></span>
                        </p>

                        <?php $attributeText = ""; ?>
                        @if($product->hasAttributes()) > 0)
                        @foreach($product['attributes'] as $attribute)
                            @if($loop->last)
                                <?php $attributeText .= $attribute['variation_display_text']; ?>
                            @else
                                <?php $attributeText .= $attribute['variation_display_text'] . ": "; ?>
                            @endif
                        @endforeach
                        @endif
                        <p>属性: <span
                                    class="text-success"><strong>{{ $attributeText}}</strong></span>
                        </p>

                    </div>
                </div>
            </td>
            <td class="col-1 pull-right">
                @if($product->qty() > 1)
                <a  href="{{ route('minus', ['slug' =>$product->slug()])}}"><h3>-</h3></a>
                    @endif
            </td>
            <td class="col-1">
                <input type="text"  name="qty" style="width: 50px;text-align: center;" value="{{ $product->qty() }}"/>
                <input type="hidden" name="slug" value="{{$product->slug() }}"/>
            </td>
            <td class="col-1" >
                <a  href="{{ route('add', ['slug' =>$product->slug()])}}"><h3>+</h3></a>
            </td>

            <td class="col-sm-1 col-1 text-center">
                <strong>{{ $product->priceFormat() }}</strong>
            </td>


            {{--@if(Cart::hasTax())--}}
                {{--<td class="col-sm-1 col-1 text-center">--}}
                    {{--<strong>{{ $product->tax() }}</strong>--}}
                {{--</td>--}}
            {{--@endif--}}

            <td class="col-sm-1 col-1 text-center">
                <strong>{{ $product->lineTotal() }}</strong>
            </td>
            <td class="col-sm-1 col-1">
                <div class="btn-group">
                    {{--<a class="btn btn-warning" href="#"--}}
                       {{--onclick="jQuery('#cart-form-update').submit()">--}}
                    {{--确定修改--}}
                    {{--</a>--}}
                    {{--<button type="button"--}}
                            {{--class="btn dropdown-toggle"--}}
                            {{--data-toggle="dropdown">--}}
                        {{--<span class="caret"></span>--}}
                        {{--<span class="sr-only">切换下拉</span>--}}
                    {{--</button>--}}

                    <span>



                    <a class="btn" href="{{ route('cart.destroy', $product->slug())}}">
                                删除
                    </a>
                    </span>

                </div>

            </td>

        </tr>


{{--</form>--}}
