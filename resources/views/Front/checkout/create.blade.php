<x-layout-front>

    <div class="container pb-5 mb-2 mb-md-4 rtl __inline-56" style="text-align: left;">
        <div class="row">
            <div class="col-md-12 mb-5 pt-5">
                <div class="feature_header">
                    <span>{{ __('Shipping And Billing Address')}}</span>
                </div>
            </div>
            <section class="col-lg-8">
                <div class="checkout_details">

                    <style>
                        .steps-light .step-item.active .step-count,
                        .steps-light .step-item.active .step-progress {
                            color: #fff;
                            background-color: #3b71de;
                        }

                        .steps-light .step-count,
                        .steps-light .step-progress {
                            color: #4f4f4f;
                            background-color: rgba(225, 225, 225, 0.67);
                        }

                        .steps-light .step-item.active.current {
                            color: #3b71de !important;
                            pointer-events: none;
                        }

                        .steps-light .step-item {
                            color: #4f4f4f;
                            font-size: 14px;
                            font-weight: 400;
                        }
                    </style>
                    <div class="steps steps-light pt-2 pb-2">
                        <a class="step-item active " href="https://6valley.6amtech.com/checkout-details">
                            <div class="step-progress">
                                <span class="step-count"><i class="czi-user-circle"></i></span>
                            </div>
                            <div class="step-label">
                                {{ __('Sign in')}} / {{ __('Sign up')}}
                            </div>
                        </a>
                        <a class="step-item active current" href="https://6valley.6amtech.com/checkout-details">
                            <div class="step-progress">
                                <span class="step-count"><i class="czi-package"></i></span>
                            </div>
                            <div class="step-label">
                                {{ __('Shipping And Billing')}}
                            </div>
                        </a>
                        <a class="step-item  " href="https://6valley.6amtech.com/checkout-payment">
                            <div class="step-progress">
                                <span class="step-count"><i class="czi-card"></i></span>
                            </div>
                            <div class="step-label">
                                {{ __('Payment')}}
                            </div>
                        </a>
                    </div>
                    <input type="hidden" id="physical_product" name="physical_product" value="yes">

                    <h2 class="h4 pb-3 mb-2 mt-5">{{ __('Choose shipping address')}}</h2>
                    <form method="post" action="{{ route('front.checkout')}}" class="card __card" id="address-form">
                        @csrf
                        <div class="card-body p-0">
                            <ul class="list-group">
                                <li class="list-group-item" onclick="anotherAddress()">
                                    <input type="radio" name="shipping_method_id" id="sh-0" value="0"
                                        data-toggle="collapse" data-target="#collapseThree" checked>
                                    <span class="checkmark" style="margin-right: 10px"></span>
                                    <button type="button" class="btn btn-outline" data-toggle="collapse"
                                        data-target="#collapseThree">{{ __('Another Address')}}
                                    </button>
                                    <div id="accordion">
                                        <div id="collapseThree" class="collapse show" aria-labelledby="headingThree"
                                            data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="form-group row">

                                                    <div class="col-md-6">
                                                        <label for="exampleInputEmail1">{{ __('firstname')}}
                                                            <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control"
                                                            name="billing_firstname" value="{{ old('billing_firstname', $user->name) }}" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="exampleInputEmail1">{{ __('lastname')}}
                                                            <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control"
                                                            name="billing_lastname" value="{{ old('billing_lastname', $user->name) }}" required>
                                                    </div>

                                                 </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">{{ __('email')}}
                                                        <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" value="{{ old('billing_email', $user->email) }}" name="billing_email" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">{{ __('Phone')}}
                                                        <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="billing_phone" value="{{ old('billing_phone', $user->mobile) }}" required>
                                                </div>
                                                {{-- <div class="form-group">
                                                    <label for="exampleInputPassword1">Address Type</label>
                                                    <select class="form-control" name="address_type">
                                                        <option value="permanent">Permanent</option>
                                                        <option value="home">Home</option>
                                                        <option value="others">Others</option>
                                                    </select>
                                                </div> --}}
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">{{ __('City')}}<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" value="{{ old('billing_city') }}" name="billing_city" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">{{ __('Zip code')}}
                                                        <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="billing_postalcode" value="{{ old('billing_postalcode') }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">{{ __('Country')}}
                                                        <span style="color: red">*</span></label>
                                                    <select name="billing_country" id=""
                                                        class="form-control " >
                                                        @foreach ($countries as $code => $name)
                                                        <option value="{{ $code }}" @if($code == old('billing_country')) selected @endif>{{ $name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">{{ __('Address')}}<span
                                                            class="text-danger">*</span></label>
                                                    <textarea class="form-control" id="address" value="{{ old('billing_address') }}" type="text" name="billing_address" required></textarea>
                                                </div>
                                                {{-- <div class="form-group">
                                                    <input id="pac-input" class="controls rounded __inline-46"
                                                        title="Search your location here" type="text"
                                                        placeholder="Search here" />
                                                    <div class="__h-200px" id="location_map_canvas"></div>
                                                </div> --}}
                                                <div class="form-check" style="padding-left: 1.25rem;">
                                                    <input type="checkbox" name="save_address"
                                                        class="form-check-input" id="exampleCheck1">
                                                    <label class="form-check-label" for="exampleCheck1"
                                                        style="padding-left: 1.09rem">
                                                        {{ __('Save this address')}}
                                                    </label>
                                                </div>
                                                {{-- <input type="hidden" id="latitude" name="latitude"
                                                    class="form-control d-inline" placeholder="Ex : -94.22213"
                                                    value="21.7679" required readonly>
                                                <input type="hidden" name="longitude" class="form-control"
                                                    placeholder="Ex : 103.344322" id="longitude" value="78.8718"
                                                    required readonly> --}}
                                                {{-- <button type="submit" class="btn btn--primary" style="display: none"
                                                    id="address_submit"></button> --}}
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    {{-- </form> --}}
                    <div style="display: ">

                        <h2 class="h4 pb-3 mb-2 mt-4">{{ __('Choose billing address')}}</h2>
                        <div class="form-check mb-2" style="padding-left: 1.25rem;">
                            <input type="checkbox" id="same_as_shipping_address" onclick="hide_billingAddress()"
                                name="same_as_shipping_address" class="form-check-input">
                            <label class="form-check-label" for="same_as_shipping_address"
                                style="padding-left: 1.09rem">
                                {{ __('Same as shipping address')}}
                            </label>
                        </div>
                        {{-- <form method="post" class="card __card" id="billing-address-form"> --}}
                            <div id="hide_billing_address" class="card-body p-0">
                                <ul class="list-group">
                                    <li class="list-group-item" onclick="billingAddress()">
                                        <input type="radio" name="billing_method_id" id="bh-0" value="0"
                                            data-toggle="collapse" data-target="#billing_model" checked>
                                        <span class="checkmark" style="margin-right: 10px"></span>
                                        <button type="button" class="btn btn-outline" data-toggle="collapse"
                                            data-target="#billing_model">{{ __('Another Address')}}
                                        </button>
                                        <div id="accordion">
                                            <div id="billing_model" class="collapse show"
                                                aria-labelledby="headingThree" data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="form-group row">

                                                        <div class="col-md-6">
                                                            <label for="exampleInputEmail1">{{ __('firstname')}}
                                                                <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control"
                                                                name="shipping_firstname" value="{{ old('shipping_firstname', $user->name) }}" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="exampleInputEmail1">{{ __('lastname')}}
                                                                <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control"
                                                                name="shipping_lastname" value="{{ old('shipping_lastname', $user->name) }}" required>
                                                        </div>

                                                     </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">{{ __('email')}}
                                                            <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" value="{{ old('shipping_email', $user->email) }}" name="shipping_email" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">{{ __('Phone')}}
                                                            <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="shipping_phone" value="{{ old('shipping_phone', $user->mobile) }}" required>
                                                    </div>
                                                    {{-- <div class="form-group">
                                                        <label for="exampleInputPassword1">Address Type</label>
                                                        <select class="form-control" name="address_type">
                                                            <option value="permanent">Permanent</option>
                                                            <option value="home">Home</option>
                                                            <option value="others">Others</option>
                                                        </select>
                                                    </div> --}}
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">{{ __('City')}}<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" value="{{ old('shipping_city') }}" name="shipping_city" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">{{ __('Zip code')}}
                                                            <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="shipping_postalcode" value="{{ old('shipping_postalcode') }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">{{ __('Country')}}
                                                            <span style="color: red">*</span></label>
                                                        <select name="shipping_country" id=""
                                                            class="form-control " >
                                                            @foreach ($countries as $code => $name)
                                                            <option value="{{ $code }}" @if($code == old('shipping_country')) selected @endif>{{ $name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">{{ __('Address')}}<span
                                                                class="text-danger">*</span></label>
                                                        <textarea class="form-control" id="address" value="{{ old('shipping_address') }}" type="text" name="shipping_address" required></textarea>
                                                    </div>
                                                    {{-- <div class="form-group">
                                                        <input id="pac-input" class="controls rounded __inline-46"
                                                            title="Search your location here" type="text"
                                                            placeholder="Search here" />
                                                        <div class="__h-200px" id="location_map_canvas"></div>
                                                    </div> --}}
                                                    <div class="form-check" style="padding-left: 1.25rem;">
                                                        <input type="checkbox" name="save_address"
                                                            class="form-check-input" id="exampleCheck1">
                                                        <label class="form-check-label" for="exampleCheck1"
                                                            style="padding-left: 1.09rem">
                                                            {{ __('Save this address')}}
                                                        </label>
                                                    </div>
                                                    {{-- <input type="hidden" id="latitude" name="latitude"
                                                        class="form-control d-inline" placeholder="Ex : -94.22213"
                                                        value="21.7679" required readonly>
                                                    <input type="hidden" name="longitude" class="form-control"
                                                        placeholder="Ex : 103.344322" id="longitude" value="78.8718"
                                                        required readonly> --}}
                                                    {{-- <button type="submit" class="btn btn--primary" style="display: none"
                                                        id="address_submit"></button> --}}
                                                </div>
                                                </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="row mt-3">
                                <div class="col-6">
                                    <a class="btn btn-secondary btn-block" href="https://6valley.6amtech.com/shop-cart">
                                        <i class="czi-arrow-left mt-sm-0 mx-1"></i>
                                        <span class="d-none d-sm-inline">{{ __('Shop cart')}}</span>
                                        <span class="d-inline d-sm-none">{{ __('Shop cart')}}</span>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn--primary btn-block"> {{ __('send')}}
                                    {{-- <a class="btn btn--primary btn-block" href="javascript:" > --}}
                                        {{-- <span class="d-none d-sm-inline">Proceed payment</span>
                                        <span class="d-inline d-sm-none">Next</span>
                                        <i class="czi-arrow-right mt-sm-0 mx-1"></i> --}}
                                    </button>
                                    {{-- </a> --}}
                                </div>
                            </div>

                        </form>
                    </div>


                </div>
            </section>
            <style>
                .cart_title {
                    font-weight: 400 !important;
                    font-size: 16px;
                }

                .cart_value {
                    font-weight: 600 !important;
                    font-size: 16px;
                }

                .cart_total_value {
                    font-weight: 700 !important;
                    font-size: 25px !important;
                    color: #3b71de !important;
                }
            </style>
            <aside class="col-lg-4 pt-4 pt-lg-2">
                <div class="__cart-total">
                    <div class="cart_total">
                        <div class="d-flex justify-content-between">
                            <span class="cart_title">{{ __('Sub total')}}</span>
                            <span class="cart_value">
                                $5,500.0
                            </span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="cart_title">{{ __('Tax')}}</span>
                            <span class="cart_value">
                                $275.0
                            </span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="cart_title">{{ __('Shipping')}}</span>
                            <span class="cart_value">
                                $200.0
                            </span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="cart_title">{{ __('Discount on product')}}</span>
                            <span class="cart_value">
                                - $550.0
                            </span>
                        </div>
                        <div class="pt-2">
                            <form class="needs-validation" action="javascript:" method="post" novalidate
                                id="coupon-code-ajax">
                                <div class="form-group">
                                    <input class="form-control input_code" type="text" name="code"
                                        placeholder="Coupon code" required>
                                    <div class="invalid-feedback">{{ __('Please provide coupon code')}}</div>
                                </div>
                                <button class="btn btn--primary btn-block" type="button"
                                    onclick="couponCode()">{{ __('Apply code')}}
                                </button>
                            </form>
                        </div>
                        <hr class="mt-2 mb-2">
                        <div class="d-flex justify-content-between">
                            <span class="cart_title">{{ __('Total')}}</span>
                            <span class="cart_value">
                                <x-currency :amount="$total" />
                            </span>
                        </div>
                    </div>
                    <div class="container mt-2">
                        <div class="row p-0">
                            <div class="col-md-3 p-0 text-center mobile-padding">
                                <img class="order-summery-footer-image"
                                    src="https://6valley.6amtech.com/public/assets/front-end/png/delivery.png"
                                    alt="">
                                <div class="deal-title">{{ __('3 Days free delivery')}} </div>
                            </div>
                            <div class="col-md-3 p-0 text-center">
                                <img class="order-summery-footer-image"
                                    src="https://6valley.6amtech.com/public/assets/front-end/png/money.png"
                                    alt="">
                                <div class="deal-title">{{ __('Money back guarantee')}}</div>
                            </div>
                            <div class="col-md-3 p-0 text-center">
                                <img class="order-summery-footer-image"
                                    src="https://6valley.6amtech.com/public/assets/front-end/png/Genuine.png"
                                    alt="">
                                <div class="deal-title">{{ __('100% Genuine Product')}}</div>
                            </div>
                            <div class="col-md-3 p-0 text-center">
                                <img class="order-summery-footer-image"
                                    src="https://6valley.6amtech.com/public/assets/front-end/png/Payment.png"
                                    alt="">
                                <div class="deal-title">{{ __('Authentic payment')}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>


</x-layout-front>
