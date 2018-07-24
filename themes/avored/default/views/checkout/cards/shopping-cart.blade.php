<div class="card mb-3">
    <div class="card-header">购物车</div>
    <div class="row">
        <div class="col-12">


    <div class="card-body">
        <table id="cart_table" class="table table-bordered table-hover table-responsive">
            <thead>
            <tr>
                <th class="text-left col-5">产品名称</th>
                <th class="text-right hidden-xs col-3">数量</th>
                <th class="text-right hidden-xs col-2">单价</th>
                <th class="text-right col-2">总价</th>
            </tr>
            </thead>
            <tbody>
            <?php $subTotal = 0;$totalTax = 0; ?>
            @foreach($cartItems as $cartItem)
                <tr>
                    <td class="text-left col-5">
                       <img style="width: 60px;height: 60px;" src="{{asset($cartItem->image()->other_path->smallUrl)}}"> {{ $cartItem->name() }}

                        &nbsp;
                        <?php $attributeText = ""; ?>
                        @if($cartItem->hasAttributes()) > 0)
                        @foreach($cartItem['attributes'] as $attribute)
                            @if($loop->last)
                                <?php $attributeText .= $attribute['variation_display_text']; ?>
                            @else
                                <?php $attributeText .= $attribute['variation_display_text'] . ": "; ?>
                            @endif
                        @endforeach


                        <p> 属性: <span
                                    class="text-success"><strong>{{ $attributeText}}</strong></span>
                        </p>
                        @endif

                    </td>

                    <td class="text-right hidden-xs col-3" >&nbsp;&nbsp;&nbsp;&nbsp;{{ $cartItem->qty() }}&nbsp;&nbsp;</td>
                    <td class="text-right hidden-xs col-2">
                        {{ $cartItem->priceFormat()  }}</td>
                    <td class="text-right col-2">
                        {{ $cartItem->finalPrice()  }}</td>
                </tr>

                @php

                    $subTotal += $cartItem->finalPrice();
                @endphp

                <input type="hidden" name="products[]" value="{{ $cartItem->slug() }}"/>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3" class="text-right  hidden-xs"><strong>小计:</strong></td>
                <td class="text-right sub-total" data-sub-total="{{ number_format((float)$subTotal, 2, '.', '') }}">
                    ${{ number_format((float)$subTotal, 2, '.', '') }}</td>
            </tr>
            <tr class="hidden shipping-row">
                <td colspan="3" class="text-right shipping-title  hidden-xs"
                    style="font-weight: bold;">优惠
                </td>
                <td class="text-right shipping-cost" data-shipping-cost="0.00"></td>
            </tr>

            <tr>
                <td colspan="3" class="text-right  hidden-xs"><strong>总价格:</strong></td>
                <td class="text-right total" data-total="{{ number_format((float)$subTotal, 2, '.', '') }}">
                    {{ number_format((float)$subTotal, 2, '.', '') }}</td>
            </tr>
            </tfoot>

        </table>
    </div>
</div>

</div>
</div>