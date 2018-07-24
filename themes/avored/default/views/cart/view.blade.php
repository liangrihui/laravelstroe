@extends('layouts.app')

@section('meta_title','Cart Page AvoRed E commerce')
@section('meta_description','Cart Page AvoRed E commerce')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="h1">购物车页面</div>

                @if($cartProducts !== null && $cartProducts->count() > 0)

                    <table class="table table-responsive">
                        <tr>
                            {{--@if(Cart::hasTax())--}}
                                {{--<th class="col-6">产品</th>--}}
                            {{--@else--}}
                            <th class="col-6">产品</th>
                            {{--@endif--}}
                            <th class="col-1"></th>
                            <th class="col-1" style="text-align: center">数量</th>
                            <th class="col-1"></th>
                            <th class="col-1 text-center">价格</th>
                            {{--@if(Cart::hasTax())--}}
                                {{--<th class="col-1 text-center">税收</th>--}}
                            {{--@endif--}}
                            <th class="col-1 text-center">总价</th>
                            <th class="col-1"> </th>
                        </tr>
                        <?php $total = 0; $taxTotal = 0;$giftCouponAmount = 0; ?>
                        @foreach($cartProducts as $product)

                            @php
                            $i =0;
                            $total += $product->price()*$product->qty();
          //
                            @endphp
                            @include('cart._single_product', ['product'=>$product,'i'=>$i])
                        @php
                            $i++;
                            @endphp
                        @endforeach


                        <tr>

                            <td class="col-6">&nbsp;  </td>
                            <td class="col-3">&nbsp;  </td>
                            <td class="col-1"> &nbsp;  </td>

                            <td class="col-1"><h6>合计</h6></td>
                            <td class="col-1 text-right"><h6>
                                    <strong>${{ number_format($total,2) }}</strong></h6></td>
                        </tr>

                        {{--@if(Cart::hasTax())--}}
                        {{--<tr>--}}

                            {{--<td class="col-8">&nbsp;  </td>--}}
                            {{--<td class="col-1">&nbsp;  </td>--}}
                            {{--<td class="col-1"> &nbsp;  </td>--}}
                            {{--<td class="col-1"> &nbsp;  </td>--}}
                            {{--<td class="col-1"><h6>加税合计</h6></td>--}}
                            {{--<td class="col-1 text-right"><h6>--}}
                                    {{--<strong>${{ number_format((Cart::taxTotal()),2) }}</strong></h6></td>--}}
                        {{--</tr>--}}
                        {{--@endif--}}
                        <tr>

                            <td class="col-6">&nbsp;  </td>
                            <td class="col-3">  </td>
                            <td class="col-1"> &nbsp;</td>
                            {{--<td class="col-1">  </td>--}}
                            <td class="col-1">
                                <a href="{{ route('home') }}" class="btn btn-light">
                                    <span class="fa fa-shopping-cart"></span> 继续购物
                                </a>
                            </td>
                            <td class="col-1 text-right">
                                @if(Auth::check())
                                <a href="{{ route('checkout.index') }}" class="btn btn-success">
                                    付款 <span class="fa fa-play-circle"></span>
                                </a>
                                    @else
                                    <a href="{{ route('login') }}" class="btn btn-success">
                                        需要登录才能付款
                                    </a>
                                @endif
                            </td>
                        </tr>
                    </table>


                @elseif(Auth::check())
                    <p>购物车里没有产品.</p>
                @else
                    你还没有登录，你可以 <a href="{{route('login')}}"> <strong>登录查看</strong> </a> 你的购物车是否有产品
                @endif

            </div>
        </div>
    </div>
    </div>
@endsection