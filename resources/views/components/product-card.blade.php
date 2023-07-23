{{-- <div class="col-md-3 col-sm-4 col-6"> --}}
    <div class="product-single-hover">
        <div class="overflow-hidden position-relative">
            <div class=" inline_product clickable d-flex justify-content-center" style="background:#3b71de10;">
                <div class="d-flex">
                    @php
 
    $discountValue = $product->previous_price - $product->price; ;
    $discountPercentage = ($discountValue / $product->previous_price) * 100;
@endphp
                    <span class="for-discoutn-value p-1 pl-2 pr-2">
                             {{ number_format($discountPercentage, 0) }}% {{ __('Off')}}

                      
                    </span>
                </div>
                <div class="d-flex d-block">
                    <a href="{{ route('front.products.show', $product->id) }}" class="d-block">
                        <img src="{{ $product->image_path }}"
                            onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'">
                    </a>
                </div>
            </div>
            <div class="single-product-details">
                <div class="text-center">
                    <a href="{{ route('front.products.show', $product->id) }}"
                        style="font-weight: 400;
            font-size: 13px; ">
                        {{ $product->name }}
                    </a>
                </div>
                <div class="rating-show justify-content-between text-center">
                    <span class="d-inline-block font-size-sm text-body"
                        style="font-weight: 400;
        font-size: 10px;">
@php
$averageRating = number_format($product->averageRating(), 1);

@endphp

@php
                                            $rating = $averageRating;
                                            $maxRating = 5;
                                        @endphp

                                        @for ($i = 1; $i <= $maxRating; $i++)
                                            @if ($i <= $rating)
                                                <i class="fas fa-star active" style="color: #fea569 !important;"></i>
                                            @else
                                                <i class="fas fa-star"  ></i>
                                            @endif
                                        @endfor
 
                        <label class="badge-style">(  {{ $product->countRatings() }} )</label>
                    </span>
                </div>
                <div class="justify-content-between text-center">
                    <div class="product-price text-center" style="font-weight: 400;
            font-size: 12px;">
                        <strike style="font-size: 12px!important;color: #E96A6A!important;">
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
                    style="margin-top:0px;padding-top:5px;padding-bottom:5px;padding-left:10px;padding-right:10px;"
                    href="{{ route('front.products.show', $product->id) }}">
                    <i class="fa-solid fa-eye align-middle mr-1"></i>
                    {{ __('Quick View')}}
                </a>
            </div>
        </div>
    </div>
{{-- </div> --}}
