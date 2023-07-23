<x-menu-setting>
    <x-slot:header>
        <div class="container text-center">
            <h3 class="headerTitle my-3">{{ __('Wishlist')}}</h3>
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

    <section class="col-lg-9 col-md-9" id="set-wish-list">

        @foreach ($wishlists as $item)

         <div class="card __card __card-mobile-340 mb-3">
            <div class="product">
                <div class="card">
                    <div class="row g-2">
                        <div class="wishlist_product_img col-md-4 col-xl-2 col-lg-3 col-sm-4">
                            <a href="https://6valley.6amtech.com/product/test-1-w3PUfR" class="d-block h-100">
                                <img class="__img-full"
                                    src="{{ $item->product->image_path }}"
                                    onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'"
                                    alt="wishlist">
                            </a>
                        </div>
                        <div
                            class="wishlist_product_desc align-self-center col-sm-8 col-md-8 col-xl-10 col-lg-9 py-3 px-sm-4">
                            <div class="font-name">
                                <a href="{{ route('front.products.show',$item->product->id) }}">{{ $item->product->name }}</a>
                            </div>
                            <span class="sellerName"> {{ __('Description')}} : {{ $item->product->description }} </span>
                            <div class="">
                                <strike style="color: #E96A6A;" class="mr-3">
                                    <x-currency :amount="$item->product->previous_price" />
                                </strike>
                                <span class="font-weight-bold amount"><x-currency :amount="$item->product->price" /></span>
                            </div>
                        </div>
                        <form action="{{ route('front.wishlist.destroy',$item->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="wishlist_product_icon" style="border: none;
                            background: transparent;" type="submit"><i style="color: red" class="fa-solid fa-circle-xmark"></i></button>
                        </form>
                     </div>
                </div>
            </div>
        </div>

        @endforeach

    </section>




</x-menu-setting>
