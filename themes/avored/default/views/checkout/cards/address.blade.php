<div class="card mt-3">
    <div class="card-header">您的地址</div>



    <div class="card-body">
        <form id="add_new_address" action="{{route('my-account.address.store')}}" method="Post">
            @csrf
        <div id="payment-address-new">

            @php
                $address = NULL;
                if (NULL !== $user = Auth::user()) {
                    $address = $user->getBillingAddress();
                }
            @endphp

            @if(NULL === $address)
                <div class="row">
                    <div class="form-group  col-6">
                        <label class="control-label" for="input-billing-firstname">姓</label>
                        <input type="text" name="first_name"
                               value="" placeholder="姓"
                               id="input-billing-firstname"

                               @if($errors->has('first_name'))
                               class="is-invalid form-control"
                               @else
                               class="form-control"
                                @endif
                        />
                        @if ($errors->has('first_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('first_name') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group  col-6">
                        <label class="control-label" for="input-billing-lastname">名</label>
                        <input type="text" name="last_name"
                               value="" placeholder="名"
                               id="input-billing-lastname"
                               @if($errors->has('last_name'))
                               class="is-invalid form-control"
                               @else
                               class="form-control"
                                @endif
                        />
                        @if ($errors->has('shipping.last_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('last_name') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group   col-6">
                    <label class="control-label" for="input-shipping-phone">联系电话</label>
                    <input type="text" name="phone" value="" placeholder="Phone"
                           id="input-shipping-phone"
                           @if($errors->has('shipping.phone'))
                           class="is-invalid form-control"
                           @else
                           class="form-control"
                            @endif
                    />
                    @if ($errors->has('phone'))
                        <div class="invalid-feedback">
                            {{ $errors->first('phone') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="country">国家</label>
                    <select name="country_id" data-name="country_id"
                            class="{{ $errors->has('billing.country_id') ? "is-invalid" : "" }}
                                    billing-country form-control billing tax-calculation"
                    >
                        @foreach($countries as $countryId => $countryName)
                            @if($countryId == 150)
                                <option
                                        value="{{ $countryId }}" selected="selected">{{ $countryName }}</option>
                            @else
                                <option
                                        value="{{ $countryId }}">{{ $countryName }}</option>
                            @endif

                        @endforeach
                    </select>

                    @if ($errors->has('billiing.country_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('billing.country_id') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="control-label" for="input-billing-address-1">省份</label>
                    <input type="text" name="province" value="" placeholder="Address 1"
                           id="input-billing-address-1"
                           @if($errors->has('billing.province'))
                           class="is-invalid form-control"
                           @else
                           class="form-control"
                            @endif
                    />
                    @if ($errors->has('billing.province'))
                        <div class="invalid-feedback">
                            {{ $errors->first('billing.province') }}
                        </div>
                    @endif
                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <label class="control-label" for="input-billing-zone">地区 /
                           街道</label>
                        <input type="text" name="state" data-name="state_code"
                               id="input-billing-zone"


                               @if($errors->has('billing.state'))
                               class="is-invalid billing tax-calculation form-control"
                               @else
                               class="billing tax-calculation form-control"
                                @endif
                        />
                        @if ($errors->has('billing.state'))
                            <div class="invalid-feedback">
                                {{ $errors->first('billing.state') }}
                            </div>
                        @endif

                    </div>


                    <div class="form-group  col-6">
                        <label class="control-label" for="input-billing-city">城市</label>
                        <input type="text" data-name="city" name="city"
                               placeholder="City"
                               id="input-billing-city"

                               @if($errors->has('billing.city'))
                               class="is-invalid billing tax-calculation form-control"
                               @else
                               class="billing tax-calculation form-control"
                                @endif
                        />
                        @if ($errors->has('billing.city'))
                            <div class="invalid-feedback">
                                {{ $errors->first('billing.city') }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label" for="input-billing-postcode">邮编</label>
                    <input type="text" data-name="postcode" name="postcode" value=""
                           placeholder="Post Code"
                           id="input-billing-postcode"

                           @if($errors->has('billing.postcode'))
                           class="is-invalid shipping_calc billing tax-calculation form-control"
                           @else
                           class="billing shipping_calc tax-calculation form-control"
                            @endif
                    />
                    @if ($errors->has('billing.postcode'))
                        <div class="invalid-feedback">
                            {{ $errors->first('billing.postcode') }}
                        </div>
                    @endif
                </div>
                <input type="hidden" name="type" value="BILLING">
                <button type="submit" class="btn btn-primary">保存</button>
            @else

                <div class="form-group  col-12">
                    <div class="card card-default">
                        <div class="card-header">默认地址</div>
                        <div class="card-body">

                            <p>
                                {{ $address->first_name.$address->last_name }}
                                <br/>
                                {{ $address->phone }}<br/>
                                {{ $address->country->name.' '.$address->province }}
                                {{ $address->area }}<br/>
                                {{ $address->city }}<br/>
                                {{ $address->state }}<br/>

                            </p>
                            {{--<input type="hidden" name="billing[id]" value="{{ $address->id }}"/>--}}
                        </div>
                    </div>
                </div>

            @endif


            <div class="form-group col-12">
                <label for="use_different_shipping_address">
                    <input type="checkbox" style="zoom:150%;" id="use_different_shipping_address" name="use_different_shipping_address"
                           onclick="if (this.checked == true){
                                                            jQuery('.different-shipping-form').css('display','block');
                                                            } else  { jQuery('.different-shipping-form').css('display','none'); }
                                                        "><strong style="font-size: 20px;color: #ac2925">新建地址</strong>
                    </label>
            </div>

        </div>


        <div class="different-shipping-form" style="display:none">

            <div class="row">
                <div class="form-group  col-6">
                    <label class="control-label" for="input-billing-firstname">姓</label>
                    <input type="text" name="first_name"
                           value="" placeholder="姓"
                           id="input-billing-firstname"

                           @if($errors->has('first_name'))
                           class="is-invalid form-control"
                           @else
                           class="form-control"
                            @endif
                    />
                    @if ($errors->has('first_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('first_name') }}
                        </div>
                    @endif
                </div>
                <div class="form-group  col-6">
                    <label class="control-label" for="input-billing-lastname">名</label>
                    <input type="text" name="last_name"
                           value="" placeholder="名"
                           id="input-billing-lastname"
                           @if($errors->has('last_name'))
                           class="is-invalid form-control"
                           @else
                           class="form-control"
                            @endif
                    />
                    @if ($errors->has('shipping.last_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('last_name') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6">
                    <label class="control-label" for="input-shipping-postcode">邮编</label>
                    <input type="text" data-name="postcode" name="postcode" value=""
                           placeholder="Post Code"
                           id="input-shipping-postcode"
                           @if($errors->has('postcode'))
                           class="is-invalid shipping tax-calculation form-control"
                           @else
                           class="shipping tax-calculation form-control"
                            @endif
                    />
                    @if ($errors->has('postcode'))
                        <div class="invalid-feedback">
                            {{ $errors->first('postcode') }}
                        </div>
                    @endif
                </div>

                <div class="form-group   col-6">
                    <label class="control-label" for="input-shipping-phone">联系电话</label>
                    <input type="text" name="phone" value="" placeholder="Phone"
                           id="input-shipping-phone"
                           @if($errors->has('shipping.phone'))
                           class="is-invalid form-control"
                           @else
                           class="form-control"
                            @endif
                    />
                    @if ($errors->has('phone'))
                        <div class="invalid-feedback">
                            {{ $errors->first('phone') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label" for="input-shipping-address-1">省份</label>
                <input type="text" name="province" value="" placeholder="省份"
                       id="input-shipping-address-1"
                       @if($errors->has('province'))
                       class="is-invalid form-control"
                       @else
                       class="form-control"
                        @endif
                />
                @if ($errors->has('province'))
                    <div class="invalid-feedback">
                        {{ $errors->first('province') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="input-shipping-country-id">国家</label>
                <select name="country_id" data-name="country_id"

                        id="input-shipping-country-id"
                        @if($errors->has('country_id'))
                        class="is-invalid shipping tax-calculation form-control"
                        @else
                        class="shipping tax-calculation form-control"
                        @endif
                />


                @foreach($countries as $countryId => $countryName)
                    <option
                            @if($countryId ==150)
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

            <div class="row">
                <div class="form-group col-6">
                    <label class="control-label" for="input-shipping-zone">地区 /
                        街道</label>
                    <input type="text" data-name="state_code" name="state"
                           id="input-shipping-zone"

                           @if($errors->has('state'))
                           class="is-invalid shipping tax-calculation form-control"
                           @else
                           class="shipping tax-calculation form-control"
                            @endif
                    />
                    @if ($errors->has('state'))
                        <div class="invalid-feedback">
                            {{ $errors->first('state') }}
                        </div>
                    @endif
                </div>


                <div class="form-group  col-6">
                    <label class="control-label" for="input-shipping-city">城市</label>
                    <input type="text" data-name="city" name="city" placeholder="City"
                           id="input-shipping-city"
                           @if($errors->has('city'))
                           class="is-invalid shipping tax-calculation form-control"
                           @else
                           class="shipping tax-calculation form-control"
                            @endif
                    />
                    @if ($errors->has('country_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('city') }}
                        </div>
                    @endif

                </div>
            </div>


            <input type="hidden" name="type" value="SHIPPING">
            <button type="submit" class="btn btn-primary">保存</button>
        </div>

        </form>
    </div>
</div>