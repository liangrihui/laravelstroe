@extends('layouts.app')

@section('meta_title','结帐页面')
@section('meta_description','结帐页面')


@section('content')

    <div class="container">
        @if(Auth::check())
        <div class="h1">结帐</div>
        @if(is_null($cartItems))
            <p>抱歉没有找到产品 <a href="{{ route('home') }}">购物入门</a></p>
        @else


                <div class="row">
                    <div class="col-4">

                        {{--@include('checkout.cards.personal')--}}

                        @include('checkout.cards.address')
                    </div>
                    <div class="col-8">
                    <form id="place-order-form" method="post" action="{{ route('order.place') }}">
                        @csrf


                        @include('checkout.cards.shipping-options')

                        {{--@include('checkout.cards.payment-options')--}}

                        @include('checkout.cards.shopping-cart')

                        <div class="card mb-3">
                            <div class="card-header">
                                您的留言
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <textarea name="comment" rows="1" class="form-control"></textarea>

                                </div>

                                <div class="text-left form-check">

                                    <input id="agree" type="checkbox"
                                           class="form-check-input{{  $errors->has('agree') ? " is-invalid" : "" }}"
                                           name="agree" value="1"/>
                                    <label for="agree" class="form-check-label">
                                        我已经阅读并同意了
                                        <a href="#" target="_blank"
                                           class="{{  $errors->has('agree') ? " text-danger" : "" }}  agree">
                                            <b>条款 &amp; 条件</b>
                                        </a>
                                    </label>


                                    @if ($errors->has('agree'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('agree') }}
                                        </div>
                                    @endif

                                </div>


                                <div class="payment float-right clearfix">
                                    <input type="button" class="btn btn-primary"
                                           data-loading-text="Loading..."
                                           id="place-order-button"
                                           value="下订单">


                                </div>
                            </div>
                        </div>


                    </form>
                    </div>
                </div>

        @endif
    </div>
    @else
        <h1>您需要登录才能结账  ————  <a href="{{route('login')}}"> 登录 </a></h1>
    @endif
@endsection

@push('scripts')
    <script>

        $(function () {

            function calcualateTotal() {

                var subTotal        = parseFloat(jQuery('.sub-total').attr('data-sub-total')).toFixed(2);
                var shippingCost    = parseFloat(jQuery('.shipping-cost').attr('data-shipping-cost')).toFixed(2);
                var taxAmount       = 0.00;//parseFloat(jQuery('.tax-amount').attr('data-tax-amount')).toFixed(2);

                var total = parseFloat(subTotal + taxAmount + shippingCost).toFixed(2);

                jQuery('.total').attr('data-total', total);
                jQuery('.total').html("$" + total);


            }


            function checkIfUserExist(data) {
                $.post({
                    url: "/check-user-exists",
                    data: data,
                    type: 'json',
                    success: function (res) {
                        console.info(res);
                    }
                });
            }

            jQuery(document).on('change', '#input-user-email', function (e) {
                var data = {
                    'email': jQuery(this).val(),
                    '_token': '{{ csrf_token()  }}'
                };

                checkIfUserExist(data);

            });

            jQuery('.shipping_option_radio').change(function (e) {

                if (jQuery(this).is(':checked')) {
                    var shippingTitle = jQuery(this).attr('data-title');
                    var shippingCost = jQuery(this).attr('data-cost');

                    jQuery('.shipping-row').removeClass('hidden');

                    jQuery('.shipping-row .shipping-title').html(shippingTitle + ":");
                    jQuery('.shipping-row .shipping-cost').html("$" + shippingCost);
                    jQuery('.shipping-row .shipping-cost').attr('data-shipping-cost', shippingCost);


                } else {
                    jQuery('.shipping-row').addClass('hidden');
                }
                calcualateTotal();
            });

            jQuery(document).on('change','.shipping_calc',function (e) {
                e.preventDefault();


                if(jQuery(this).hasClass('billing') ) {

                    if(!jQuery('#use_different_shipping_address').is(':checked')) {

                        jQuery('.shipping-option .shipping_option_radio').each(function (i,el) {
                            jQuery(el).trigger('shippingAddressChange');
                        });
                    }
                }
            });



            jQuery('.avored-payment-option').change(function (e) {
                e.preventDefault();
                jQuery(this).trigger('paymentOptionChange');
            });

            jQuery('#place-order-button').click(function (e) {

                e.preventDefault();

                if(jQuery('.payment-radio-options input:radio').length <= 0) {

                    jQuery('.payment-radio-options input:radio').each(function (i, el) {
                        if (jQuery(el).is(':checked')) {
                            jQuery(this).prop('disabled', true);
                            jQuery(el).trigger('paymentProcessStart');
                        }
                    });
                } else {
                    jQuery('#place-order-form').submit();
                }


            });

            jQuery("#place-order-button").bind('paymentProcessEnd', function (e) {
                e.preventDefault();
                jQuery(this).prop('disabled',false);
                jQuery('#place-order-form').submit();
            });

        });
    </script>
@endpush
