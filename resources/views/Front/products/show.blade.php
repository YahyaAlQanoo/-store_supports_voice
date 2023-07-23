<x-layout-front>
    @if ($errors->any())
        <div class="alert alert-danger">
            {{ __('Error') }}!
            <ul>
                @foreach ($errors->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="__inline-23">

        <div class="container mt-4 rtl" style="text-align: left;">

            <div class="row ">

                <div class="col-lg-9 col-12">
                    <div class="row">
                        <div class="col-lg-5 col-md-4 col-12">
                            <div class="cz-product-gallery">
                                <div class="cz-preview">
                                    <div
                                        class="cz-preview-item d-flex align-items-center justify-content-center active">
                                        <img class="cz-image-zoom img-responsive w-100 __max-h-323px"
                                            onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'"
                                            src="{{ $product->image_path }}" data-zoom="{{ $product->image_path }}"
                                            alt="Product image" width="">
                                        <div class="cz-image-zoom-pane"></div>
                                    </div>
                                    @foreach ($product->gallaries as $item)
                                        <div class="cz-preview-item d-flex align-items-center justify-content-center   "
                                            id="image{{ $loop->index }}">
                                            <img class="cz-image-zoom img-responsive w-100 __max-h-323px"
                                                onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'"
                                                src="{{ $item->image_url }}" data-zoom="{{ $item->image_url }}"
                                                alt="Product image" width="">
                                            <div class="cz-image-zoom-pane"></div>
                                        </div>
                                    @endforeach

                                </div>
                                <div class="cz">
                                    <div class="table-responsive __max-h-515px">
                                        <div class="d-flex">
                                            @foreach ($product->gallaries as $item)
                                                <div class="cz-thumblist">
                                                    <a class="cz-thumblist-item  active d-flex align-items-center justify-content-center"
                                                        id="preview-img{{ $loop->index }}"
                                                        href="#image{{ $loop->index }}">
                                                        <img onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'"
                                                            src="{{ $item->image_url }}" alt="Product thumb">
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7 col-md-8 col-12 mt-md-0 mt-sm-3" style="direction: ltr">
                            <div class="details __h-100">
                                <span class="mb-2 __inline-24">{{ $product->name }}</span>
                                <div class="d-flex flex-wrap align-items-center mb-2 pro">
                                    <span class="d-inline-block align-middle mt-1 mr-md-2 mr-sm-0 pr-2 __color-FE961C">
                                        @php
                                            $averageRating = number_format($product->averageRating(), 1);
                                            
                                        @endphp
                                        {{ $averageRating }}
                                    </span>
                                    <div class="star-rating" style="margin-right: 25px;">

                                        @php
                                            $rating = $averageRating;
                                            $maxRating = 5;
                                        @endphp
                                        @for ($i = 1; $i <= $maxRating; $i++)
                                            @if ($i <= $rating)
                                                <i class="fas fa-star active" style="color: #fea569 !important;"></i>
                                            @else
                                                <i class="fas fa-star"></i>
                                            @endif
                                        @endfor
                                    </div>
                                    <span
                                        class="font-regular font-for-tab d-inline-block font-size-sm text-body align-middle mt-1 ml-1 mr-md-2 mr-1 pl-md-2 pl-sm-1 pr-md-2 pr-sm-1">{{ $product->countRatings() }}
                                        {{ __('Reviews') }}</span>
                                    <span class="__inline-25"></span>
                                    <span
                                        class="font-regular font-for-tab d-inline-block font-size-sm text-body align-middle mt-1 ml-1 mr-md-2 mr-1 pl-md-2 pl-sm-1 pr-md-2 pr-sm-1">{{ $orderCount }}
                                        {{ __('Orders') }} </span>
                                    <span class="__inline-25"> </span>
                                    <span
                                        class="font-regular font-for-tab d-inline-block font-size-sm text-body align-middle mt-1 ml-1 mr-md-2 mr-0 pl-md-2 pl-sm-1 pr-md-2 pr-sm-1 text-capitalize">
                                        {{ $wishlist }} {{ __('Wish listed') }} </span>
                                </div>
                                <div class="mb-3">
                                    <span class="h3 font-weight-normal text-accent ">
                                        <x-currency :amount="$product->price" />
                                    </span>
                                    <span class="ml-2 __text-12px font-regular">(
                                         <strike style="font-size: 15px!important;    font-weight: 800; color: #E96A6A!important;">
                                            <span><x-currency :amount="$product->previous_price" /></span>
                                        </strike>)
                                     </span>
                                </div>
                                <form id="add-to-cart-form" method="post" action="{{ route('front.cart') }}"
                                    class="mb-2">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    {{-- <div class="position-relative mr-n4 mb-2">
                                        <div class="flex-start">
                                            <div class="product-description-label mt-2 text-body">{{ __('Color') }}:
                                            </div>
                                            <div>
                                                <ul class="list-inline checkbox-color mb-1 flex-start ml-2"
                                                    style="padding-left: 0;">
                                                    <div>
                                                        <li>
                                                            <input type="radio" id="3-color-9966CC" name="color"
                                                                value="#9966CC" checked>
                                                            <label style="background: #9966CC;" for="3-color-9966CC"
                                                                data-toggle="tooltip"
                                                                onclick="focus_preview_image_by_color('9966CC')">
                                                                <span class="outline"></span></label>
                                                        </li>
                                                    </div>
                                                    <div>
                                                        <li>
                                                            <input type="radio" id="3-color-FAEBD7" name="color"
                                                                value="#FAEBD7">
                                                            <label style="background: #FAEBD7;" for="3-color-FAEBD7"
                                                                data-toggle="tooltip"
                                                                onclick="focus_preview_image_by_color('FAEBD7')">
                                                                <span class="outline"></span></label>
                                                        </li>
                                                    </div>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="row flex-start mx-0">
                                        <div class="product-description-label text-body mt-2 pr-2">{{ __('type') }}
                                            :
                                        </div>
                                        <div>
                                            <ul class="list-inline checkbox-alphanumeric checkbox-alphanumeric--style-1 mb-2 mx-1 flex-start row"
                                                style="padding-left: 0;">
                                                <div>
                                                    <li class="for-mobile-capacity">
                                                        <input type="radio" id="choice_2-a" name="choice_2"
                                                            value="a" checked>
                                                        <label class="__text-12px" for="choice_2-a">a</label>
                                                    </li>
                                                </div>
                                                <div>
                                                    <li class="for-mobile-capacity">
                                                        <input type="radio" id="choice_2-                    \b"
                                                            name="choice_2" value="                    \b">
                                                        <label class="__text-12px"
                                                            for="choice_2-                    \b"> \b</label>
                                                    </li>
                                                </div>
                                            </ul>
                                        </div>
                                    </div> --}}

                                    <div class="mt-2">
                                        <div class="product-quantity d-flex flex-wrap align-items-center __gap-15">
                                            <div class="d-flex align-items-center">
                                                <div class="product-description-label text-body mt-2">
                                                    {{ __('Quantity') }}:
                                                </div>
                                                <div class="d-flex justify-content-center align-items-center __w-160px"
                                                    style="color: #3b71de">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-number __p-10" type="button"
                                                            data-type="minus" data-field="quantity"
                                                            disabled="disabled" style="color: #3b71de">
                                                            -
                                                        </button>
                                                    </span>
                                                    <input type="text" name="quantity" id="quantity"
                                                        class="form-control input-number text-center cart-qty-field __inline-29"
                                                        placeholder="1" value="{{ old('quantity', 1) }}"
                                                        product-type="physical" min="1" max="100">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-number __p-10" type="button"
                                                            product-type="physical" data-type="plus"
                                                            data-field="quantity" style="color: #3b71de">
                                                            +
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div id="chosen_price_div">
                                                <div class="d-flex justify-content-center align-items-center mr-2">
                                                    <div class="product-description-label"><strong  >{{ __('Total') }}
                                                            {{ __('price') }}</strong> :  ₪ <span id="totalPrice"></span></div>
                                                    &nbsp; <strong id="chosen_price"></strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row no-gutters d-none mt-2 flex-start d-flex">
                                        <div class="col-12">
                                        </div>
                                    </div>
                                    <div class="__btn-grp mt-2 mb-3">
                                         <button type="submit"
                                            class="btn btn--primary element-center btn-gap-right" />
                                        <span class="string-limit">{{ __('Add to cart') }}</span>
                                        </button>
                                        {{-- <a href="{{ route('front.wishlist.show', $product->id) }}"
                                            class="btn __text-18px text-danger">
                                            @if ($wishlist)
                                                <i class="fa-solid fa-heart"></i>
                                            @else
                                                <i class="fa-regular fa-heart"></i>
                                            @endif

                                            <span class="countWishlist-3">{{ $wishlist }}</span>
                                        </a> --}}
                                        <a  onclick="wishlistButton({{$product->id}})"

                                            class="btn __text-18px text-danger"
                                            id="wishlistButton">
                                            
                                            @if ($wishlist)
                                                <i class="fa-solid fa-heart"></i>
                                            @else
                                                <i class="fa-regular fa-heart"></i>
                                            @endif

                                            <span class="countWishlist-3" id="wishlistCount">{{ $wishlist }}</span>

                                        </a>
                                    </div>
                                </form>
                                <div style="text-align:left;" class="sharethis-inline-share-buttons"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mt-4 rtl col-12" style="text-align: left;">
                            <div class="row">
                                <div class="col-12">
                                    <div class=" mt-1">

                                        <ul class="nav nav-tabs d-flex justify-content-center __mt-35" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link __inline-27 active " href="#overview"
                                                    data-toggle="tab" role="tab">
                                                    {{ __('Overview') }}
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link __inline-27" href="#reviews" data-toggle="tab"
                                                    role="tab">
                                                    {{ __('Reviews') }}
                                                </a>
                                            </li>
                                        </ul>
                                        <div
                                            class="px-4 pt-lg-3 pb-3 mb-3 mr-0 mr-md-2 bg-white __review-overview __rounded-10">
                                            <div class="tab-content px-lg-3">

                                                <div class="tab-pane fade show active" id="overview"
                                                    role="tabpanel">
                                                    <div class="row pt-2 specification">
                                                        <div class="text-body col-lg-12 col-md-12 overflow-scroll">
                                                            {{ $product->description }}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="reviews" role="tabpanel">
                                                    <div class="row pt-2 pb-3">
                                                        <div class="__inline-30">
                                                            @auth
                                                                
                                                             @if (!$product->hasUserRated(Auth::user()))
                                                                <form
                                                                    action="{{ route('rate.product', ['product' => $product]) }}"
                                                                    method="POST">
                                                                    @csrf

                                                                    <div class="form-group">
                                                                        <label for="rating">Rate the product:</label>
                                                                        <select name="rating" id="rating"
                                                                            class="form-control">
                                                                            <option value="5">Excellent</option>
                                                                            <option value="4">Good</option>
                                                                            <option value="3">Average</option>
                                                                            <option value="2">Below Average
                                                                            </option>
                                                                            <option value="1">Poor</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="message">Leave a message:</label>
                                                                        <textarea name="message" id="message" class="form-control" rows="3"></textarea>
                                                                    </div>

                                                                    <button type="submit"
                                                                        class="btn btn-primary">Submit Rating</button>
                                                                </form>
                                                            @else
                                                                <p>You have already rated this product.</p>
                                                            @endif

                                                            @endauth


                                                        </div>
                                                    </div>
                                                    <div class="row pb-4 mb-3">
                                                        <div class="__inline-30">
                                                            <span class="text-capitalize">Product Review</span>
                                                        </div>
                                                    </div>
                                                    <div class="row pt-2 pb-3">
                                                        <div class="col-lg-4 col-md-5 ">
                                                            <div
                                                                class=" row d-flex justify-content-center align-items-center">
                                                                <div
                                                                    class="col-12 d-flex justify-content-center align-items-center">
                                                                    <h2 class="overall_review mb-2 __inline-28">
                                                                        @php
                                                                            $averageRating = number_format($product->averageRating(), 1);
                                                                        @endphp
                                                                        {{ $averageRating }}
                                                                    </h2>
                                                                </div>
                                                                <div
                                                                    class="d-flex justify-content-center align-items-center star-rating ">




                                                                    <div class="star-rating"
                                                                        style="margin-right: 25px;">
                                                                        @php
                                                                            $rating = $averageRating;
                                                                            $maxRating = 5;
                                                                        @endphp
                                                                        @for ($i = 1; $i <= $maxRating; $i++)
                                                                            @if ($i <= $rating)
                                                                                <i class="fas fa-star active"
                                                                                    style="color: #fea569 !important;"></i>
                                                                            @else
                                                                                <i class="fas fa-star active"></i>
                                                                            @endif
                                                                        @endfor
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="col-12 d-flex justify-content-center align-items-center mt-2">
                                                                    <span class="text-center">
                                                                        {{ $product->countRatings() }} Ratings
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8 col-md-7 pt-sm-3 pt-md-0">

                                                            @php
                                                                $ratingCounts = [];
                                                                
                                                                for ($i = 1; $i <= 5; $i++) {
                                                                    $ratingCounts[$i] = $ratings->where('rating', $i)->count();
                                                                }
                                                            @endphp

                                                            @for ($i = 1; $i <= 5; $i++)
                                                                <div
                                                                    class="d-flex align-items-center mb-2 font-size-sm">
                                                                    <div class="__rev-txt"><span
                                                                            class="d-inline-block align-middle text-body">
                                                                            @if ($i == 1)
                                                                                Poor
                                                                                @endif @if ($i == 2)
                                                                                    Below Average
                                                                                    @endif @if ($i == 3)
                                                                                        Average
                                                                                        @endif @if ($i == 4)
                                                                                            Good
                                                                                            @endif @if ($i == 5)
                                                                                                Excellent
                                                                                            @endif
                                                                        </span>
                                                                    </div>
                                                                    <div class="w-0 flex-grow">
                                                                        <div class="progress text-body __h-5px">
                                                                            <div class="progress-bar "
                                                                                role="progressbar"
                                                                                style="background-color: #3b71de !important;width: 100%;"
                                                                                aria-valuenow="60" aria-valuemin="0"
                                                                                aria-valuemax="100"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-1 text-body">
                                                                        <span class=" ml-3 float-right ">
                                                                            {{ $ratingCounts[$i] }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            @endfor

                                                        </div>
                                                    </div>
                                                    <div class="row pb-4 mb-3">
                                                        <div class="__inline-30">
                                                            <span class="text-capitalize">Product Review</span>
                                                        </div>
                                                    </div>
                                                    <div class="row pb-4">
                                                        <div class="col-12" id="product-review-list">






                                                            @foreach ($ratings as $rating)
                                                                <div class="row product-review d-flex">
                                                                    <div class="col-md-3 d-flex mb-3 pr-5">
                                                                        <div class="media media-ie-fix mr-4 pr-2">
                                                                            <img class="rounded-circle __img-64 object-cover"
                                                                                onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'"
                                                                                src="{{ $rating->user->image_path }}"
                                                                                alt="{{ $rating->user->name }}">
                                                                            <div class="media-body pl-3 text-body">
                                                                                <span
                                                                                    class="font-size-sm mb-0 text-body"
                                                                                    style="font-weight: 700;font-size: 12px;">{{ $rating->user->name }}</span>
                                                                                <div>
                                                                                    <div class="mr-2"
                                                                                        style="display: flex">
                                                                                        @for ($i = 1; $i <= 5; $i++)
                                                                                            @if ($i <= $rating->rating)
                                                                                                <i class="fas fa-star active"
                                                                                                    style="color: #fea569 !important;"></i>
                                                                                            @else
                                                                                                <i
                                                                                                    class="fas fa-star active"></i>
                                                                                            @endif
                                                                                        @endfor
                                                                                    </div>
                                                                                    <div class="text-body"
                                                                                        style="font-weight: 400;font-size: 15px;">
                                                                                        {{ $rating->rating }}/5</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-7">
                                                                        <p class="mb-3 text-body __text-sm"
                                                                            style="word-wrap:break-word;">
                                                                            {{ $rating->message }}</p>
                                                                    </div>
                                                                    <div class="col-md-2 text-body">
                                                                        <span
                                                                            style="float: right;font-weight: 400;font-size: 13px;">{{ $rating->created_at->format('M-d-Y') }}</span>
                                                                    </div>
                                                                </div>
                                                            @endforeach













                                                        </div>
                                                        <div class="col-12">
                                                            <div
                                                                class="card-footer d-flex justify-content-center align-items-center">
                                                                <button class="btn text-white"
                                                                    style="background: #3b71de;"
                                                                    onclick="load_review()">View more</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 ">
                    <div class="product-details-shipping-details">
                        <div class="shipping-details-bottom-border">
                            <div class="px-3 py-3">
                                <img class="mr-2 __img-20"
                                    src="https://6valley.6amtech.com/public/assets/front-end/png/Payment.png"
                                    alt="">
                                <span>{{ __('Safe Payment') }}</span>
                            </div>
                        </div>
                        <div class="shipping-details-bottom-border">
                            <div class="px-3 py-3">
                                <img class="mr-2 __img-20"
                                    src="https://6valley.6amtech.com/public/assets/front-end/png/money.png"
                                    alt="">
                                <span>{{ __('7 Days Return Policy') }}</span>
                            </div>
                        </div>
                        <div class="shipping-details-bottom-border">
                            <div class="px-3 py-3">
                                <img class="mr-2 __img-20"
                                    src="https://6valley.6amtech.com/public/assets/front-end/png/Genuine.png"
                                    alt="">
                                <span>{{ __('100% Authentic Products') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="__inline-31">
                        <div class="row">
                            <div class="col-12 position-relative">
                                <div class="d-flex __seller-author align-items-center">
                                    <div>
                                        <img class="__img-60 img-circle" src="{{ $product->store->image_path }}"
                                            onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'"
                                            alt="">
                                    </div>
                                    <div class="ml-2 w-0 flex-grow">
                                        <h6>
                                            {{ $product->store->name }}
                                        </h6>
                                        <span>{{ __('Seller info') }}</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    
                                </div>
                            </div>
                            <div class="col-12 msg-option mt-2" id="msg-option">
                                <form action="">
                                    <input type="text" class="seller_id" hidden seller-id="1">
                                    <textarea shop-id="1" class="chatInputBox form-control" id="chatInputBox" rows="5"> </textarea>
                                    <div class="d-flex mt-2 __gap-15">
                                        <button class="btn btn-secondary text-white d-block w-47"
                                            id="cancelBtn">{{ __('Cancel') }}
                                        </button>
                                        <button class="btn btn-success text-white d-block w-47"
                                            id="sendBtn">{{ __('Send') }}</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="row d-flex justify-content-between">
                                    <div class="col-6 ">
                                        <div class="d-flex justify-content-center align-items-center rounded __h-79px"
                                            style="background:#3b71de10;">
                                            <div class="text-center">
                                                <span
                                                    style="color: #3b71de;font-weight: 700;
                                                        font-size: 26px;">
                                                    {{$StoreCountRation}}
                                                </span><br>
                                                <span class="__text-12px">
                                                    {{ _('Reviews') }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex justify-content-center align-items-center rounded __h-79px"
                                            style="background:#3b71de10;">
                                            <div class="text-center">
                                                <span
                                                    style="color: #3b71de;font-weight: 700;
                                                        font-size: 26px;">
                                                    {{ $product->store->products->count() }}
                                                </span><br>
                                                <span class="__text-12px">
                                                    {{ __('Products') }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div>
                                    <a href="{{ route('front.sellers.show', $product->store->id) }}"
                                        class="w-100 d-block text-center">
                                        <button class="btn w-100 d-block text-center"
                                            style="background: #3b71de;color:#ffffff">
                                            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                            {{ __('Visit Store') }}
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-3 py-3">
                        <div class="row d-flex justify-content-center">
                            <span class="text-center __text-16px font-bold">
                                {{ __('More From The Store') }}
                            </span>
                        </div>
                    </div>
                    <div>
                        @foreach ($product->store->products()->take(4)->get() as $item)
                            <div class="flash_deal_product rtl"
                                style="cursor: pointer; height:155px; margin-bottom:10px;"
                                onclick="location.href='{{ route('front.products.show', $item->id) }}'">
                                <div class="d-flex" style="position:absolute;z-index:2;">
                                    @php
                                        
                                        $discountValue = $item->previous_price - $item->price;
                                        $discountPercentage = ($discountValue / $item->previous_price) * 100;
                                    @endphp
                                    <span class="for-discoutn-value p-1 pl-2 pr-2">
                                        {{ number_format($discountPercentage, 0) }}% {{ __('Off')}}
                                    </span>
                                </div>
                                <div class=" d-flex" style="">
                                    <div class=" d-flex align-items-center justify-content-center"
                                        style="padding-left:14px;padding-top:14px;">
                                        <div class="flash-deals-background-image" style="background: #3b71de10">
                                            <img class="__img-125px" src="{{ $item->image_path }}"
                                                onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'" />
                                        </div>
                                    </div>
                                    <div class=" flash_deal_product_details pl-3 pr-3 pr-1 d-flex align-items-center">
                                        <div>
                                            <div>
                                                <span class="flash-product-title">
                                                    {{ $item->name }}
                                                </span>
                                            </div>
                                            <div class="flash-product-review">

                                                @php
                                                    $averageRating = number_format($item->averageRating(), 1);
                                                    
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

                                                <label class="badge-style2">
                                                    ( {{ $item->countRatings() }} )
                                                </label>
                                            </div>
                                            <div>
                                                <strike style="font-size: 12px!important;color: #E96A6A!important;">
                                                    <x-currency :amount="$item->previous_price" />
                                                </strike>
                                            </div>
                                            <div class="flash-product-price">
                                                <x-currency :amount="$item->price" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>

        <div class="container  mb-3 rtl" style="text-align: left;">
            <div class="row flex-between">
                <div class="text-capitalize font-bold __text-30px" style="margin-left: 5px;">
                    <span>{{ __('Similar products') }}</span>
                </div>
                <div class="view_all d-flex justify-content-center align-items-center">
                    <div>
                        <a class="text-capitalize view-all-text" style="color:#3b71de !important;margin-right: 8px;"
                            href="https://6valley.6amtech.com/products?id=11&amp;data_from=category&amp;page=1">{{ __('View all') }}
                            <i class="czi-arrow-right ml-1 mr-n1"></i>
                        </a>
                    </div>
                </div>
            </div>


            <div class="row mt-4">
                @foreach ($similar_products as $product)
                    <div class="col-xl-2 col-sm-2 col-md-2 col-lg-2 col-6">
                        <x-product-card :product="$product" />

                    </div>
                @endforeach


            </div>
        </div>
        <div class="modal fade rtl" id="show-modal-view" tabindex="-1" role="dialog"
            aria-labelledby="show-modal-image" aria-hidden="true" style="text-align: left;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body flex justify-content-center">
                        <button class="btn btn-default __inline-33" style="right: -7px;" data-dismiss="modal">
                            <i class="fa fa-close"></i>
                        </button>
                        <img class="element-center" id="attachment-view" src="">
                    </div>
                </div>
            </div>
        </div>
    </div>



    <style>
        .social-media :hover {
            color: #f58300 !important;
        }

        .start_address_under_line {
            width: 331px;
        }
    </style>


    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Get the form element
        var addToCartForm = document.getElementById('add-to-cart-form');

        // Add a submit event listener to the form
        addToCartForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Get the product ID and quantity from the form
            var productId = document.querySelector('input[name="product_id"]').value;
            var quantity = document.querySelector('input[name="quantity"]').value;

            // Make a POST request using Axios
            axios.post('/front/cart', {
                    product_id: productId,
                    quantity: quantity
                })
                .then(function(response) {
                    console.log(response.data);
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Added To Cart Is Successfully',
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                    });
                })
                .catch(function(error) {
                    console.log(error.response.data);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Added To Cart Is Failed',
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                    });
                });
        });
    </script>

<script>
    // Get the initial quantity value from the input field
    var quantityInput = document.getElementById('quantity');
    var quantity = parseInt(quantityInput.value);

    // Get the price value from the Laravel variable
    var price = {{ $product->price }}; // Assuming $price is the Laravel variable containing the price value

    // Calculate the total price based on the initial quantity
    var totalPrice = quantity * price;

    // Update the content of the <span> element with the initial total price
    document.getElementById('totalPrice').textContent = totalPrice.toFixed(2); // Assuming you want to display the price with 2 decimal places

    // Add an event listener to detect changes in the quantity input field
    quantityInput.addEventListener('change', function() {
        // Update the quantity value
        quantity = parseInt(this.value);

        // Recalculate the total price
        totalPrice = quantity * price;

        // Update the content of the <span> element with the new total price
        document.getElementById('totalPrice').textContent = totalPrice.toFixed(2);
    });
</script>

<script>
 function wishlistButton($id) {

 
         // Make an Axios POST request to the wishlist route
        axios.get(`/front/wishlist/${$id}`) 
            .then(function(response) {
                // Toggle the heart icon based on the response
                
                Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.data.data ,
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                });

             })
            .catch(function(error) {
                console.log(error);

                Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'added into wishlist Is Failed',
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                });
            });

    };
</script>

 

</x-layout-front>
