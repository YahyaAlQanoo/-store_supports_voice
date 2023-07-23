<x-menu-setting>

    <link rel="stylesheet" href="https://6valley.6amtech.com/public/assets/back-end/vendor/icon-set/style.css">
    <link rel="stylesheet" href="https://6valley.6amtech.com/public/assets/front-end/css/style.css">

    <x-slot:header>
        <div class="container text-center">
            <h3 class="headerTitle my-3">{{ __('Order Details')}}</h3>
        </div>

    </x-slot:header>
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> {{ __('Alert!')}}</h5>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="col-lg-9 col-md-9">
        <div class="row">
            <div class="col-md-6 mb-4">
                <a class="page-link" href="{{ route('front.orders.index')}}">
                    <i class="czi-arrow-left mr-2"></i>{{ __('Back')}}
                </a>
            </div>
        </div>
        <div class="card box-shadow-sm">
            <div class="payment mb-3 table-responsive">
                <table class="table table-borderless">
                    <thead>
                        <tr class="order_table_tr" style="background: #3b71de">
                            <td class="order_table_td">
                                <div class="order_table_info_div">
                                    <div class="order_table_info_div_1 py-2">
                                        <span class="d-block spandHeadO" style="    color: #fff!important;
                                        font-weight: 400;
                                        font-size: 13px;">{{ __('Order no')}}: </span>
                                    </div>
                                    <div class="order_table_info_div_2">
                                        <span class="spanTr" style="color: #fff;
                                        font-weight: 900;
                                        font-size: 13px;"> {{ $order->number}} </span>
                                    </div>
                                </div>
                            </td>
                            <td class="order_table_td">
                                <div class="order_table_info_div">
                                    <div class="order_table_info_div_1 py-2">
                                        <span class="d-block spandHeadO" style="    color: #fff!important;
                                        font-weight: 400;
                                        font-size: 13px;">{{ __('Order date')}}: </span>
                                    </div>
                                    <div class="order_table_info_div_2">
                                        <span class="spanTr" style="color: #fff;
                                        font-weight: 900;
                                        font-size: 13px;"> {{ \Carbon\Carbon::parse($order->created_at)->format('d M, Y') }} </span>
                                    </div>
                                </div>
                            </td>
                            <td class="order_table_td">
                                <div class="order_table_info_div">
                                    <div class="order_table_info_div_1 py-2">
                                        <span class="d-block spandHeadO" style="    color: #fff!important;
                                        font-weight: 400;
                                        font-size: 13px;">{{ __('Shipping address')}}: </span>
                                    </div>
                                    <div class="order_table_info_div_2">
                                        <span class="spanTr" style="color: #fff;
                                        font-weight: 900;
                                        font-size: 13px;">
                                            {{ $order->shipping_address}}
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td class="order_table_td">
                                <div class="order_table_info_div">
                                    <div class="order_table_info_div_1 py-2">
                                        <span class="d-block spandHeadO" style="    color: #fff!important;
                                        font-weight: 400;
                                        font-size: 13px;">{{ __('Billing address')}}: </span>
                                    </div>
                                    <div class="order_table_info_div_2">
                                        <span class="spanTr" style="color: #fff;
                                        font-weight: 900;
                                        font-size: 13px;">
                                        {{ $order->billing_address}}
                                        </span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="payment mb-3 table-responsive">
                <div class="row">
                    <div class="col-md-4"
                        onclick="location.href='https://6valley.6amtech.com/product/test-seller-product-Z4KhC3'">
                    </div>
                </div>
                <div class="col-md-4">
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-2">
                </div>
                <table class="table table-borderless" style="min-width:720px">
                    <tbody>
                        @foreach ($order->items as $item)


                            <tr>
                                <td class="col-2 for-tab-img">
                                    <img class="d-block"
                                        onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'"
                                        src="{{ $item->product->image_path }}"
                                        alt="VR Collection" width="60">
                                </td>
                                <td class="col-10 for-glaxy-name __vertical-middle">
                                    <a href="{{ route('front.products.show',$item->product->id )}}">
                                        {{ $item->product->name }}
                                    </a>
                                    <br>
                                </td>

                                <td width="100%">
                                    <div class="text-right">
                                        <span class="font-weight-bold amount"><x-currency :amount="$item->product->price" /> </span>
                                        <br>
                                        <span class="word-nobreak">Qty: {{$item->quantity }}</span>
                                    </div>
                                </td>

                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>

                                <td width="100%">
                                    <div class="text-right">
                                        <span class="font-weight-bold amount"><x-currency :amount="$item->price * $item->quantity " /> </span>
                                    </div>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>


                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="payment mb-3 table-responsive">
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="card-header">
                        Write something
                    </div>
                    <div class="modal-body">
                        <form action="https://6valley.6amtech.com/messages-store" method="post" id="chat-form">
                            <input type="hidden" name="_token" value="Au1TnX711pjktEgvtBxooUPauZLOCnYUFW3DCqq5">
                            <input value="" name="delivery_man_id" hidden="">
                            <textarea name="message" class="form-control" required=""></textarea>
                            <br>
                            <button class="btn btn--primary" style="color: white;">{{ __('Send')}}</button>
                        </form>
                    </div>
                    <div class="card-footer">
                        <a href="https://6valley.6amtech.com/chat/delivery-man" class="btn btn--primary mx-1">
                            {{ __('Go to Chatbox')}}
                        </a>
                        <button type="button" class="btn btn-secondary pull-right" data-dismiss="modal">{{ __('Close')}}
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-end">
            <div class="col-md-8 col-lg-5">
                <table class="table table-borderless">
                    <tbody class="totals">
                        <tr>
                            <td>
                                <div class="text-left"><span class="product-qty ">{{ __('Item')}}</span></div>
                            </td>
                            <td>
                                 <div class="text-right">
                                    <span>{{ $items }}</span>
                                </div>
                            </td>
                        </tr>
        
            
            
                        <tr class="border-top border-bottom">
                            <td>
                                <div class="text-left"><span class="font-weight-bold">{{ __('Total')}}</span>
                                </div>
                            </td>
                            <td>
                                <div class="text-right"><span class="font-weight-bold amount "><x-currency :amount="$order->total" /></span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="justify-content mt-4 for-mobile-glaxy __gap-6px flex-nowrap">
            <a href="{{ route('front.orders.edit',$order->id) }}"
                class="btn btn--primary for-glaxy-mobile w-50">
                {{ __('Generate invoice')}}
            </a>
         </div>
    </section>




</x-menu-setting>
