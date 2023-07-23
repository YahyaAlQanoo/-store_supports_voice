<x-layout-front>

    <style>
        .view_border {
            border-top: 2px solid #e3e9ef;
            margin-bottom: 20px
        }

        .cart_information {
            background: #fff;
            border-radius: 9px;
            padding: 16px
        }

        .cart_total {
            background: #fff 0% 0% no-repeat padding-box;
            border-radius: 9px;
            padding: 16px
        }

        .cart_title {
            font-weight: 400 !important;
            font-size: 16px
        }

        .cart_value {
            font-weight: 600 !important;
            font-size: 16px
        }

        .deal-title {
            font-weight: 400 !important;
            font-size: 13px !important
        }

        .cart_information .cart_item {
            box-shadow: 0 3px 6px #0000000d;
            border-radius: 3px
        }

        .media {}

        .media-header {
            min-height: 115px;
            padding-right: 8px;
            padding-left: 8px
        }

        .media-body {
            min-height: 115px
        }

        .cart_product .product-title {
            font-weight: 400 !important;
            font-size: 16px !important;
            position: relative;
            display: inline-block;
            word-wrap: break-word;
            overflow: hidden;
            max-height: 2.4em;
            line-height: 1.2em
        }

        .cart_product .text-muted {
            font-weight: 400 !important;
            font-size: 12px;
            color: #6a6a6a !important
        }

        .cart_product .text-accent {
            font-weight: 400 !important;
            font-size: 16px
        }

        @media(max-width:768px) {
            .view_border {
                margin: 10px 0;
                border-top: 2px solid #e2f0ff !important
            }

            .cart_information {
                border: none;
                border-radius: 0;
                padding: 0
            }
        }
    </style>
    @if ($errors->any())
        <div class="alert alert-danger">
            Error!
            <ul>
                @foreach ($errors->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
    @endif



    <div class="container pb-5 mb-2 mt-3 rtl" style="text-align: left;" id="cart-summary">
        <div class="feature_header mb-2">
            <span>Shopping cart</span>
        </div>

        <div class="row g-3">

            <section class="col-lg-8">






     <div class="card __card cart_information mb-3">
        <div class="card-header">
            <b>
                <span>{{ __('Shop name')}} : </span>
                <a href="https://6valley.6amtech.com/shopView/0">6valley</a>
            </b>
        </div>

        <div class="table-responsive mt-3">
            <table
                                class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table __cart-table">
                                <thead class="thead-light">
                                    <tr class="">
                                        <th class="font-weight-bold __w-5p">SL#</th>
                                        <th class="font-weight-bold __w-30p">{{ __('Product details')}}</th>
                                        <th class="font-weight-bold __w-15p">{{ __('Unit price')}}</th>
                                        <th class="font-weight-bold __w-15p">{{ __('Qty')}}</th>
                                        <th class="font-weight-bold __w-15p">{{ __('Price')}}</th>

                                        <th class="font-weight-bold __w-5p"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart as $item)

                                    <tr>
                                        <td>{{ $loop->count -1 }} </td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="__w-30p">
                                                    <a href="{{ $item->product->permalink }}">
                                                        <img class="rounded __img-62"
                                                            onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'"
                                                            src="{{ $item->product->image_path }}"
                                                            alt="Product">
                                                    </a>
                                                </div>
                                                <div class="ml-2 text-break __line-2 __w-70p">
                                                    <a href="{{ $item->product->permalink }}">{{ $item->product->name }}</a>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="text-muted mr-2">
                                                    <span class="mr-2 __text-12px">
                                                        {{ __('color : Amethyst')}}</span>
                                                </div>
                                                <div class="text-muted mr-2">
                                                    <span class="mr-2 __text-12px">
                                                        {{ __('size')}} : s</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class=" text-accent"><x-currency :amount="$item->product->price" /></div>
                                            <strike class="__inline-18">
                                                $500.0
                                            </strike>
                                        </div>
                                        </td>
                                        <td>
                                            <div>
                                                <input class="__cart-input" type="number" name="quantity[353]" id="cartQuantity353"
                                                    onchange="updateCartQuantity('1', '353')" min="1" value="{{ $item->quantity }}">
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                 <x-currency amount="{{ $item->quantity * $item->product->price}}" />
                                            </div>
                                        </td>


                                        <td>
                                            <form action="{{ route('front.cart.destroy',$item->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-link px-0 text-danger "  style="border: none;
                                                background: transparent;" type="submit"><i style="color: red" class="fa-solid fa-circle-xmark"></i></button>
                                            </form>


                                        </td>
                                    </tr>

                                 @endforeach

                    </tbody>
            </table>
        </div>

    </div>


                {{-- <div class="card __card cart_information mb-3">
                    <div class="card-header">
                        <b>
                            <span>Shop name : </span>
                            <a href="https://6valley.6amtech.com/shopView/0">6valley</a>
                        </b>
                    </div>

                    <div class="table-responsive mt-3">
                        <table
                                            class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table __cart-table">
                                            <thead class="thead-light">
                                                <tr class="">
                                                    <th class="font-weight-bold __w-5p">SL#</th>
                                                    <th class="font-weight-bold __w-30p">Product details</th>
                                                    <th class="font-weight-bold __w-15p">Unit price</th>
                                                    <th class="font-weight-bold __w-15p">Qty</th>
                                                    <th class="font-weight-bold __w-15p">Price</th>
                                                    <th class="font-weight-bold __w-15p">Shipping cost </th>
                                                    <th class="font-weight-bold __w-5p"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <div class="__w-30p">
                                                                <a href="https://6valley.6amtech.com/product/test-1-DcD1hE">
                                                                    <img class="rounded __img-62"
                                                                        onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'"
                                                                        src="https://6valley.6amtech.com/storage/app/public/product/thumbnail/2022-04-20-625fe69f72cce.png"
                                                                        alt="Product">
                                                                </a>
                                                            </div>
                                                            <div class="ml-2 text-break __line-2 __w-70p">
                                                                <a href="https://6valley.6amtech.com/product/test-1-DcD1hE">Women&#039;s
                                                                    long-sleeve lightweight french terry fleece quarter-zip top</a>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex">
                                                            <div class="text-muted mr-2">
                                                                <span class="mr-2 __text-12px">
                                                                    color : Amethyst</span>
                                                            </div>
                                                            <div class="text-muted mr-2">
                                                                <span class="mr-2 __text-12px">
                                                                    size : s</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class=" text-accent">$450.0</div>
                                                        <strike class="__inline-18">
                                                            $500.0
                                                        </strike>
                                    </div>
                                    </td>
                                    <td>
                                        <div>
                                            <input class="__cart-input" type="number" name="quantity[353]" id="cartQuantity353"
                                                onchange="updateCartQuantity('1', '353')" min="1" value="1">
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            $450.0
                                        </div>
                                    </td>
                                    <td>
                                        $100.0
                                    </td>
                                    <td>
                                        <button class="btn btn-link px-0 text-danger" onclick="removeFromCart(353)" type="button"><i
                                                class="czi-close-circle mr-2"></i>
                                        </button>
                                    </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="__w-30p">
                                                    <a href="https://6valley.6amtech.com/product/demo-product-1-DuHk4E">
                                                        <img class="rounded __img-62"
                                                            onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'"
                                                            src="https://6valley.6amtech.com/storage/app/public/product/thumbnail/2022-04-19-625e6fdf2fbb9.png"
                                                            alt="Product">
                                                    </a>
                                                </div>
                                                <div class="ml-2 text-break __line-2 __w-70p">
                                                    <a href="https://6valley.6amtech.com/product/demo-product-1-DuHk4E">Fashionable bag
                                                        for
                                                        women</a>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                            </div>
                                        </td>
                                        <td>
                                            <div class=" text-accent">$45.0</div>
                                            <strike class="__inline-18">
                                                $50.0
                                            </strike>
                                </div>



                                </td>
                                <td>
                                    <div>
                                        <input class="__cart-input" type="number" name="quantity[354]" id="cartQuantity354"
                                            onchange="updateCartQuantity('1', '354')" min="1" value="1">
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        $45.0
                                    </div>
                                </td>
                                <td>
                                    $10.0
                                </td>
                                <td>
                                    <button class="btn btn-link px-0 text-danger" onclick="removeFromCart(354)" type="button"><i
                                            class="czi-close-circle mr-2"></i>
                                    </button>
                                </td>
                                </tr>
                                </tbody>
                        </table>
                    </div>

                </div>



                <div class="card __card cart_information mb-3">
                    <div class="card-header">
                        <b>
                            <span>Shop name : </span>
                            <a href="https://6valley.6amtech.com/shopView/0">6valley</a>
                        </b>
                    </div>

                    <div class="table-responsive mt-3">
                        <table
                                            class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table __cart-table">
                                            <thead class="thead-light">
                                                <tr class="">
                                                    <th class="font-weight-bold __w-5p">SL#</th>
                                                    <th class="font-weight-bold __w-30p">Product details</th>
                                                    <th class="font-weight-bold __w-15p">Unit price</th>
                                                    <th class="font-weight-bold __w-15p">Qty</th>
                                                    <th class="font-weight-bold __w-15p">Price</th>
                                                    <th class="font-weight-bold __w-15p">Shipping cost </th>
                                                    <th class="font-weight-bold __w-5p"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <div class="__w-30p">
                                                                <a href="https://6valley.6amtech.com/product/test-1-DcD1hE">
                                                                    <img class="rounded __img-62"
                                                                        onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'"
                                                                        src="https://6valley.6amtech.com/storage/app/public/product/thumbnail/2022-04-20-625fe69f72cce.png"
                                                                        alt="Product">
                                                                </a>
                                                            </div>
                                                            <div class="ml-2 text-break __line-2 __w-70p">
                                                                <a href="https://6valley.6amtech.com/product/test-1-DcD1hE">Women&#039;s
                                                                    long-sleeve lightweight french terry fleece quarter-zip top</a>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex">
                                                            <div class="text-muted mr-2">
                                                                <span class="mr-2 __text-12px">
                                                                    color : Amethyst</span>
                                                            </div>
                                                            <div class="text-muted mr-2">
                                                                <span class="mr-2 __text-12px">
                                                                    size : s</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class=" text-accent">$450.0</div>
                                                        <strike class="__inline-18">
                                                            $500.0
                                                        </strike>
                                    </div>
                                    </td>
                                    <td>
                                        <div>
                                            <input class="__cart-input" type="number" name="quantity[353]" id="cartQuantity353"
                                                onchange="updateCartQuantity('1', '353')" min="1" value="1">
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            $450.0
                                        </div>
                                    </td>
                                    <td>
                                        $100.0
                                    </td>
                                    <td>
                                        <button class="btn btn-link px-0 text-danger" onclick="removeFromCart(353)" type="button"><i
                                                class="czi-close-circle mr-2"></i>
                                        </button>
                                    </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="__w-30p">
                                                    <a href="https://6valley.6amtech.com/product/demo-product-1-DuHk4E">
                                                        <img class="rounded __img-62"
                                                            onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'"
                                                            src="https://6valley.6amtech.com/storage/app/public/product/thumbnail/2022-04-19-625e6fdf2fbb9.png"
                                                            alt="Product">
                                                    </a>
                                                </div>
                                                <div class="ml-2 text-break __line-2 __w-70p">
                                                    <a href="https://6valley.6amtech.com/product/demo-product-1-DuHk4E">Fashionable bag
                                                        for
                                                        women</a>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                            </div>
                                        </td>
                                        <td>
                                            <div class=" text-accent">$45.0</div>
                                            <strike class="__inline-18">
                                                $50.0
                                            </strike>
                                </div>



                                </td>
                                <td>
                                    <div>
                                        <input class="__cart-input" type="number" name="quantity[354]" id="cartQuantity354"
                                            onchange="updateCartQuantity('1', '354')" min="1" value="1">
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        $45.0
                                    </div>
                                </td>
                                <td>
                                    $10.0
                                </td>
                                <td>
                                    <button class="btn btn-link px-0 text-danger" onclick="removeFromCart(354)" type="button"><i
                                            class="czi-close-circle mr-2"></i>
                                    </button>
                                </td>
                                </tr>
                                </tbody>
                        </table>
                    </div>

                </div> --}}



    <form method="get">
        <div class="form-group">
            <div class="row">
                <div class="col-12">
                    <label for="phoneLabel" class="form-label input-label">{{ __('Order note')}} <span
                            class="input-label-secondary">({{ __('Optional')}})</span></label>
                    <textarea class="form-control w-100" id="order_note" name="order_note"></textarea>
                </div>
            </div>
        </div>
    </form>
    <div class="d-flex btn-full-max-sm align-items-center __gap-6px flex-wrap justify-content-between">
        <a href="https://6valley.6amtech.com" class="btn btn--primary">
            <i class="fa fa-backward px-1"></i> {{ __('Continue shopping')}}
        </a>
        <a onclick="checkout()" class="btn btn--primary pull-right">
            {{ __('Checkout')}}
            <i class="fa fa-forward px-1"></i>
        </a>
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
                        <x-currency :amount="$total" />
                    </span>
                </div>
                <div class="d-flex justify-content-between">
                    <span class="cart_title">{{ __('Tax')}}</span>
                    <span class="cart_value">
                        <x-currency :amount="0" />
                    </span>
                </div>
                <div class="d-flex justify-content-between">
                    <span class="cart_title">{{ __('Shipping')}}</span>
                    <span class="cart_value">
                        <x-currency :amount="0" />
                    </span>
                </div>
                <div class="d-flex justify-content-between">
                    <span class="cart_title">{{ __('Discount on product')}}</span>
                    <span class="cart_value">
                        <x-currency :amount="0" />
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
                        <button class="btn btn--primary btn-block" type="button" onclick="couponCode()">{{ __('Apply code')}}
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
                            src="https://6valley.6amtech.com/public/assets/front-end/png/delivery.png" alt="">
                        <div class="deal-title">{{ __('3 Days free delivery')}}} </div>
                    </div>
                    <div class="col-md-3 p-0 text-center">
                        <img class="order-summery-footer-image"
                            src="https://6valley.6amtech.com/public/assets/front-end/png/money.png" alt="">
                        <div class="deal-title">{{ __('Money back guarantee')}}}</div>
                    </div>
                    <div class="col-md-3 p-0 text-center">
                        <img class="order-summery-footer-image"
                            src="https://6valley.6amtech.com/public/assets/front-end/png/Genuine.png" alt="">
                        <div class="deal-title">{{ __('100% Genuine Product')}}}</div>
                    </div>
                    <div class="col-md-3 p-0 text-center">
                        <img class="order-summery-footer-image"
                            src="https://6valley.6amtech.com/public/assets/front-end/png/Payment.png" alt="">
                        <div class="deal-title">{{ __('Authentic payment')}}}</div>
                    </div>
                </div>
            </div>
        </div>
    </aside>
    </div>
    <script>
        cartQuantityInitialize();

        function set_shipping_id(id, cart_group_id) {
            $.get({
                url: 'https://6valley.6amtech.com/customer/set-shipping-method',
                dataType: 'json',
                data: {
                    id: id,
                    cart_group_id: cart_group_id
                },
                beforeSend: function() {
                    $('#loading').show();
                },
                success: function(data) {
                    location.reload();
                },
                complete: function() {
                    $('#loading').hide();
                },
            });
        }
    </script>
    <script>
        function checkout() {
            let order_note = $('#order_note').val();
            //console.log(order_note);
            $.post({
                url: "https://6valley.6amtech.com/order_note",
                data: {
                    _token: 'K6MCandL3DZKj0mEePqsEu02BmHlZnyDh0ZN6J81',
                    order_note: order_note,

                },
                beforeSend: function() {
                    $('#loading').show();
                },
                success: function(data) {
                    let url = "https://6valley.6amtech.com/checkout-details";
                    location.href = url;

                },
                complete: function() {
                    $('#loading').hide();
                },
            });
        }
    </script>
    </div>








</x-layout-front>
