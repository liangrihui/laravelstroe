<div class="card mb-3">
    <div class="card-header">
        选择运送地址
    </div>
    <div class="card-body shipping-option">
        <p>请选择运送地址</p>


        <div class="form-check">
            <input type="radio" name="shipping_option" class="is-invalid form-check-input shipping_option_radio" checked value="{{$defaultAddress->id}}">
            {{$defaultAddress->stringAddress()}}
            &nbsp;&nbsp;<em style="width: 80px;background-color: #A5A5A5;"> 默认地址 </em>
        </div>
        <div>

            <a href="#" onclick="
               jQuery('.different-form').css('display','block');
               jQuery('.none1').css('display','inline');">显示其他地址</a>
            <a href="#" class="none1" style="display:none;text-decoration:none;" onclick="
            jQuery('.different-form').css('display','none');
            jQuery('.none1').css('display','none');
">&nbsp;&nbsp;&nbsp; 隐藏</a>
        </div>
        <div class="different-form" style="display:none">


        {{--{{dd($shippingOptions)}}--}}
        @foreach($shippingOptions as $shippingOption)


                <div class="form-check" >

                    {{--@if($shippingOption->enable())--}}
                    <input type="radio" name="shipping_option"

                           {{--@if($errors->has('shipping_option'))--}}
                           class="is-invalid form-check-input shipping_option_radio"
                           {{--@else--}}
                           {{--class="shipping_option_radio form-check-input"--}}
                           {{--@endif--}}

                           {{--data-title="{{ $shippingOption->name() }}"--}}
                           {{--data-cost="{{ number_format($shippingOption->amount(),2) }}"--}}
                           {{--id="{{ $shippingOption->identifier() }}"--}}
                           value="{{ $shippingOption->id }}"> {{$shippingOption->stringAddress()}}

                    {{--<label for="{{ $shippingOption->identifier() }}" class="form-check-label">--}}

                        {{--@if(null === $shippingOption->amount())--}}
                            {{--{{ $shippingOption->name() }}--}}
                        {{--@else--}}
                            {{--{{ $shippingOption->name() . " $" . number_format($shippingOption->amount(),2) }}--}}
                        {{--@endif--}}




                    {{--</label>--}}
                    {{--@endif--}}
                    {{--@if ($errors->has('shipping_option'))--}}
                        <div class="invalid-feedback" style="display: block">
                            {{ $errors->first('shipping_option') }}
                        </div>
                    {{--@endif--}}

                </div>

        @endforeach
        </div>
        {{--@foreach($shippingOptions as $shippingOption)--}}
            {{--@if($shippingOption->enable())--}}
                {{--@include($shippingOption->view(), $shippingOption->with())--}}
            {{--@endif--}}
        {{--@endforeach--}}


    </div>
</div>