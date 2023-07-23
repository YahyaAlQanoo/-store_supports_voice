<div id="cart_items">
    <div class="navbar-tool dropdown ml-md-3" style="margin-right: 6px">
        <a class="navbar-tool-icon-box bg-secondary dropdown-toggle" href="{{ route('front.cart') }}">
            <span class="navbar-tool-label">
                {{ $cart->count()}}
            </span>
            <i class="fa-solid fa-cart-shopping navbar-tool-icon" style="margin-top: 14px;"></i>
         </a>
        <a class="navbar-tool-text ml-2" href="{{ route('front.cart') }}"><small>{{ __('My cart')}}</small>
            <x-currency :amount="$total" />
        </a>

        @if (!$cart->count())
            <div class="dropdown-menu dropdown-menu-right __w-20rem ">
                <div class="widget widget-cart px-3 pt-2 pb-3">
                    <div class="widget-cart-item">
                        <h6 class="text-danger text-center m-0"><i class="fa fa-cart-arrow-down"></i> {{ __('Empty Cart')}}
                        </h6>
                    </div>
                </div>
            </div>
        @else
            <div class="dropdown-menu dropdown-menu-right __w-20rem " id="open_the_cart">
                <div class="widget widget-cart px-3 pt-2 pb-3">

                    <div class="__h-15rem" data-simplebar data-simplebar-auto-hide="false">
                        @foreach ($cart as $item)

                        <div class="widget-cart-item pb-2">


                            <form action="{{ route('front.cart.destroy',$item->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="close text-danger "  style="border: none;
                                background: transparent;" type="submit"><span aria-hidden="true">&times;</span></button>
                            </form>


                                <div class="media">
                                    <a class="d-block mr-2"
                                        href="{{  $item->product->permalink  }}">
                                        <img width="64"
                                            onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'"
                                            src="{{ $item->product->image_path }}"
                                            alt="Product" />
                                    </a>
                                    <div class="media-body">
                                        <h6 class="widget-product-title">
                                            <a
                                                href="{{  $item->product->permalink  }}">{{ $item->product->name }}...</a>
                                        </h6>
                                        <span class="__text-14px">{{ __('color : Black')}}</span><br>
                                        <span class="__text-14px">{{ __('size')}} : s</span><br>
                                        <div class="widget-product-meta">
                                            <span class="text-muted mr-2">x {{ $item->quantity }}</span>
                                            <span class="text-accent mr-2">
                                                <x-currency :amount="$item->product->price" />
                                            </span>
                                        </div>
                                    </div>
                                </div>


                        </div>
                        @endforeach

                    </div>

                    <hr>
                    <div class="d-flex flex-wrap justify-content-between align-items-center py-3">
                        <div class="font-size-sm mr-2 float-right py-2 ">
                            <span class="">{{ __('Total')}} :</span>
                            <span class="text-accent font-size-base ml-1">
                                <x-currency :amount="$total" />
                            </span>
                        </div>
                        <a class="btn btn-outline-secondary btn-sm" href="{{ route('front.cart') }}">
                            {{ __('Expand cart')}} <i class="fa-solid fa-chevron-right ml-1 mr-n1"></i>
                        </a>
                    </div>
                    <a class="btn btn--primary btn-sm btn-block" href="{{ route('front.checkout') }}">
                       <i class="fa-solid fa-credit-card mr-2 font-size-base align-middle"></i>{{ __('Checkout')}}
                    </a>
                </div>
            </div>
        @endif

    </div>
</div>


{{-- <div id="cart_items">
    <div class="navbar-tool dropdown ml-md-3" style="margin-right: 6px">
        <a class="navbar-tool-icon-box bg-secondary dropdown-toggle" href="https://6valley.6amtech.com/shop-cart">
            <span class="navbar-tool-label">
                1
            </span>
            <i class="navbar-tool-icon czi-cart"></i>
        </a>
        <a class="navbar-tool-text ml-2" href="https://6valley.6amtech.com/shop-cart"><small>My cart</small>
            $2,850.0
        </a>

        <div class="dropdown-menu dropdown-menu-right __w-20rem ">
            <div class="widget widget-cart px-3 pt-2 pb-3">
                <div class="__h-15rem" data-simplebar data-simplebar-auto-hide="false">
                    <div class="widget-cart-item pb-2">
                        <button class="close text-danger " type="button" onclick="removeFromCart(1682604127)"
                            aria-label="Remove"><span aria-hidden="true">&times;</span>
                        </button>
                        <div class="media">
                            <a class="d-block mr-2"
                                href="https://6valley.6amtech.com/product/new-fashionable-box-balance-heel-shoes-RUFlJJ">
                                <img width="64"
                                    onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'"
                                    src="https://6valley.6amtech.com/storage/app/public/product/thumbnail/2022-10-12-63464b2f0be6a.png"
                                    alt="Product" />
                            </a>
                            <div class="media-body">
                                <h6 class="widget-product-title">
                                    <a
                                        href="https://6valley.6amtech.com/product/new-fashionable-box-balance-heel-shoes-RUFlJJ">New
                                        Fashionable Box Balance He...</a>
                                </h6>
                                <span class="__text-14px">color : Black</span><br>
                                <span class="__text-14px">size : s</span><br>
                                <div class="widget-product-meta">
                                    <span class="text-muted mr-2">x 1</span>
                                    <span class="text-accent mr-2">
                                        $2,850.0
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="d-flex flex-wrap justify-content-between align-items-center py-3">
                    <div class="font-size-sm mr-2 float-right py-2 ">
                        <span class="">Subtotal :</span>
                        <span class="text-accent font-size-base ml-1">
                            $2,850.0
                        </span>
                    </div>
                    <a class="btn btn-outline-secondary btn-sm" href="https://6valley.6amtech.com/shop-cart">
                        Expand cart<i class="czi-arrow-right ml-1 mr-n1"></i>
                    </a>
                </div>
                <a class="btn btn--primary btn-sm btn-block" href="https://6valley.6amtech.com/checkout-details">
                    <i class="czi-card mr-2 font-size-base align-middle"></i>Checkout
                </a>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div> --}}
