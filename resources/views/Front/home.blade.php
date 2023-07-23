<x-layout-front>
    <style>

    </style>
    <section class="bg-transparent mb-3">
        <div class="container">
            <div class="row ">
                <div class="col-12">
                    <div class="row rtl">

                        <div class="col-xl-12 col-md-12 __top-slider-images"
                            style="margin-top: 3px; padding-left:10px;width: calc(100%);
                        max-width: calc(100%);
                        flex: 0 0 calc(100% );">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="">
                                    </li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1" class="">
                                    </li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2" class="active">
                                    </li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item">
                                        <a
                                            href="https://codecanyon.net/item/6valley-multivendor-ecommerce-complete-ecommerce-mobile-app-web-and-admin-panel/31448597?s_rank=1">
                                            <img class="d-block w-100 __slide-img"
                                                onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'"
                                                src="https://6valley.6amtech.com/storage/app/public/banner/2023-06-13-64885cfee404f.png"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a
                                            href="https://codecanyon.net/item/6valley-multivendor-ecommerce-complete-ecommerce-mobile-app-web-and-admin-panel/31448597?s_rank=1">
                                            <img class="d-block w-100 __slide-img"
                                                onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'"
                                                src="https://6valley.6amtech.com/storage/app/public/banner/2023-06-13-64885ce9c7119.png"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="carousel-item active">
                                        <a
                                            href="https://codecanyon.net/item/6valley-multivendor-ecommerce-complete-ecommerce-mobile-app-web-and-admin-panel/31448597?s_rank=1">
                                            <img class="d-block w-100 __slide-img"
                                                onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'"
                                                src="https://6valley.6amtech.com/storage/app/public/banner/2023-06-13-64885cdaaf0d6.png"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">{{ __('Previous') }}</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">{{ __('Next') }}</span>
                                </a>
                            </div>
                        </div>

                    </div>
                    <script>
                        $(function() {
                            $('.list-group-item').on('click', function() {
                                $('.glyphicon', this)
                                    .toggleClass('glyphicon-chevron-right')
                                    .toggleClass('glyphicon-chevron-down');
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </section>



    <div class="container mb-4">
        <div class="row __inline-62">
            <div class="col-md-12">
                <div class="feature-product-title">
                    {{ __('Featured Products') }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="feature-product">
                    <div class="carousel-wrap p-1">
                        <div class="owl-carousel owl-theme owl-loaded owl-drag" id="featured_products_list">
                            <div class="owl-stage-outer">
                                <div class="owl-stage"
                                    style="transform: translate3d(-1394px, 0px, 0px); transition: all 0s ease 0s; width: 5578px;">
                                    @foreach ($products as $product)
                                        <div class="owl-item cloned" style="width: 212.4px; margin-right: 20px;">
                                            <div>
                                                <div class="product-single-hover">
                                                    <div class="overflow-hidden position-relative">
                                                        <div class="inline_product clickable rtl"
                                                            style="background:#1455ac10;">
                                                            <span class="for-discoutn-value p-1 pl-2 pr-2">
                                                                @php
                                                                    
                                                                    $discountValue = $product->previous_price - $product->price;
                                                                    $discountPercentage = ($discountValue / $product->previous_price) * 100;
                                                                @endphp
                                                                {{ number_format($discountPercentage, 0) }}% {{ __('Off')}}
                                                            </span>
                                                            <a href="{{ route('front.products.show', $product->id) }}">
                                                                <img src="{{ $product->image_path }}"
                                                                    onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'">
                                                            </a>
                                                        </div>
                                                        <div class="single-product-details">
                                                            <div class="text-left pl-3">
                                                                <a
                                                                    href="{{ route('front.products.show', $product->id) }}">
                                                                    {{ $product->name }}
                                                                </a>
                                                            </div>
                                                            <div
                                                                class="rating-show justify-content-between text-center">
                                                                <span class="d-inline-block font-size-sm text-body">
                                                                    @php
                                                                        $averageRating = number_format($product->averageRating(), 1);
                                                                    @endphp

                                                                    @php
                                                                        $rating = $averageRating;
                                                                        $maxRating = 5;
                                                                    @endphp

                                                                    @for ($i = 1; $i <= $maxRating; $i++)
                                                                        @if ($i <= $rating)
                                                                            <i class="fas fa-star active"
                                                                                style="color: #fea569 !important;"></i>
                                                                        @else
                                                                            <i class="fas fa-star"></i>
                                                                        @endif
                                                                    @endfor
                                                                    <label class="badge-style">(
                                                                        {{ $product->countRatings() }} )</label>
                                                                </span>
                                                            </div>
                                                            <div class="justify-content-between text-center">
                                                                <div class="product-price text-center">
                                                                    <strike
                                                                        style="font-size: 12px!important;color: #E96A6A!important;">
                                                                        <x-currency :amount="$product->previous_price" />
                                                                    </strike><br>
                                                                    <span class="text-accent">
                                                                        <x-currency :amount="$product->price" />
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-center quick-view">
                                                            <a class="btn btn--primary btn-sm"
                                                                href="{{ route('front.products.show', $product->id) }}"
                                                                onclick="quickView('12')">
                                                                <i class="fa-solid fa-eye align-middle mr-1"></i>
                                                                Quick View
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i
                                        class="czi-arrow-left"></i></button><button type="button" role="presentation"
                                    class="owl-next"><i class="fa-solid fa-arrow-right"></i></button>
                            </div>
                            <div class="owl-dots disabled"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






    {{-- Categories  --}}
    <div class="container rtl">
        <div class="row">
            <div class="col-md-6">
                <div class="card __shadow h-100">
                    <div class="card-body">
                        <div class="row d-flex justify-content-between">
                            <div class="categories-title">
                                <span class="font-semibold">{{ __('Categories') }}</span>
                            </div>
                            <div class="categories-view-all">
                                <a class="text-capitalize view-all-text"
                                    href="{{ route('front.categories.index') }}">{{ __('View all') }}
                                    <i class="fas fa-arrow-right ml-1 mr-n1"></i>
                                </a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            @foreach ($categories as $category)
                                <div class="text-center __m-5px __cate-item">
                                    <a href="{{ route('front.category.show', $category->id) }}">
                                        <div class="__img">
                                            <img onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'"
                                                src="{{ $category->image_path }}" alt="Bags &amp; Shoes">
                                        </div>
                                        <p class="text-center small mt-2"> {{ $category->name }} </p>
                                    </a>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mt-2 mt-md-0 seller-card">
                <div class="card __shadow h-100">
                    <div class="card-body">
                        <div class="row d-flex justify-content-between">
                            <div class="seller-list-title">
                                <span class="font-semibold">{{ __('Sellers') }}</span>
                            </div>
                            <div class="seller-list-view-all">
                                <a class="text-capitalize view-all-text"
                                    href="{{ route('front.sellers.index') }}">{{ __('View all') }}
                                    <i class="fas fa-arrow-right ml-1 mr-n1"></i>
                                </a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            @foreach ($stores as $store)
                                <div class="__m-5px __cate-item">
                                    <a href="{{ route('front.sellers.show', $store->id) }}">
                                        <div class="__img circle position-relative">
                                            <img onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'"
                                                src="{{ $store->image_path }}">
                                        </div>
                                        <p class="text-center small mt-2">{{ $store->name }}</p>
                                    </a>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <div class="container rtl">
        <div class="row g-4 pt-2 mt-0 mb-4 pb-2 __deal-of">
            <div class="col-xl-3 col-md-4">
                <div class="deal_of_the_day h-100" style="background: #3b71de">
                    <div class="d-flex justify-content-center align-items-center __w-70p mx-auto">
                        <h1 class="align-items-center text-white"> {{ __('Deal of the day') }}</h1>
                    </div>
                    <div class="recomanded-product-card">
                        <div class="d-flex justify-content-center align-items-center __pt-20 __m-20-r">
                            <img class="__rounded-top"
                                src="https://6valley.6amtech.com/storage/app/public/product/thumbnail/2023-06-13-64886259b34ba.png"
                                onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'"
                                alt="">
                        </div>
                        <div class="__i-1">
                            <div class="text-left __p-20px">
                                <div class="rating-show">
                                    <h5 class="font-semibold" style="color: #3b71de">
                                        {{ __('Artificial Leather Shoes for M...') }}
                                    </h5>
                                    <span class="d-inline-block font-size-sm text-body">
                                        <i class="fas fa-star active" style="color: #fea569 !important;"></i>
                                        <i class="fas fa-star active" style="color: #fea569 !important;"></i>
                                        <i class="fas fa-star active" style="color: #fea569 !important;"></i>
                                        <i class="fas fa-star active" style="color: #fea569 !important;"></i>
                                        <i class="fas fa-star active" style="color: #fea569 !important;"></i>
                                    </span>
                                </div>
                                <div class="">
                                    <strike class="__text-12px __color-E96A6A __pl-2">
                                        <x-currency :amount="100" />
                                    </strike>
                                    <span class="text-accent __text-22px __m-10px">
                                        <x-currency :amount="55" />
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="recomanded-buy-button">
                        <button class="buy_btn" style="color:#3b71de"
                            onclick="location.href='https://6valley.6amtech.com/product/demo-product-23-iLZaLC'">{{ __('Buy now') }}
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-md-8 mt-2">
                <div class="latest-product-margin">
                    <div class="d-flex justify-content-between">
                        <div class="text-center">
                            <span
                                class="for-feature-title __text-22px font-bold text-center">{{ __('Latest Products') }}</span>
                        </div>
                        <div class="mr-1">
                            <a class="text-capitalize view-all-text" href="{{ route('front.products.index') }}">
                                {{ __('View all') }}
                                <i class="fas fa-arrow-right ml-1 mr-n1"></i>
                            </a>
                        </div>
                    </div>
                    <div class="row mt-0 g-3">
                        @foreach ($last_products as $product)
                            <div class="col-xl-3 col-sm-4 col-md-6 col-lg-4 col-6">
                                <div>
                                    <div class="product-single-hover">
                                        <x-product-card :product="$product" />
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container rtl mb-3">
        <div class="row">
            <div class="col-12 pl-0 pr-0">
                <a href="#" class="cursor-pointer">
                    <img class="d-block footer_banner_img __inline-63"
                        onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'"
                        src="https://6valley.6amtech.com/storage/app/public/banner/2023-06-13-64885dd743c93.png">
                </a>
            </div>
        </div>
    </div>





    @foreach ($popular_categories as $key => $popular_category)
        <section class="container rtl pb-4">

            <div class="__p-20px rounded bg-white">
                <div class="flex-wrap __gap-6px flex-between pl-xl-4">
                    <div class="category-product-view-title">
                        <span class="for-feature-title float-left font-bold __text-20px text-uppercase"
                            style="text-align:left;">
                            {{ $popular_category->name }}
                        </span>
                    </div>
                    <div class="category-product-view-all">
                        <a class="text-capitalize view-all-text "
                            href="{{ route('front.categories.index') }}">{{ __('View all') }}
                            <i class="fas fa-arrow-right ml-1 mr-n1"></i>
                        </a>
                    </div>
                </div>
                <div class="row mt-2 justify-content-between g-3">
                    <div class="col-md-3 col-12">
                        <a href="{{ route('front.category.show', $popular_category->id) }}"
                            class="cursor-pointer d-block h-100 __cate-product-side-img">
                            <img class="h-100"
                                onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'"
                                src="{{ $popular_category->image_path }}">
                        </a>
                    </div>
                    <div class="col-md-9 col-12 ">
                        <div class="row g-2">
                            @foreach ($popular_category->products()->take(4)->get() as $product)
                                <div class="col-md-3 col-sm-4 col-6">
                                    <x-product-card :product="$product" />
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @if ($key == 1)
            <div class="container rtl py-4 ">
                <div class="row g-3">
                    <div class="col-md-6">
                        <a href="#" class="d-block">
                            <img class="footer_banner_img"
                                onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'"
                                src="https://6valley.6amtech.com/storage/app/public/banner/2023-06-13-64885d11cf334.png">
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="#" class="d-block">
                            <img class="footer_banner_img"
                                onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'"
                                src="https://6valley.6amtech.com/storage/app/public/banner/2023-06-13-64885d26757a1.png">
                        </a>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
    <script src="https://6valley.6amtech.com/public/assets/front-end/js/owl.carousel.min.js"></script>

</x-layout-front>
