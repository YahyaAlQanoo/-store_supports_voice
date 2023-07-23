<x-layout-front>
    <div class="container mb-md-4  __inline-65">
        <div class="row mt-3 mb-3 border-bottom">
            <div class="col-md-8">
                <h4 class="mt-2 text-start">{{ __('All Sellers')}}</h4>
            </div>
            <div class="col-md-4">
                <form action="#">
                    <input type="hidden" name="_token" value="UEFazQRLMGhwSVNAJzvuWqQ5GEpm1jzohXWBzVy8">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Shop name" name="shop_name" required>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">{{ __('Search')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">

            <section class="col-lg-12">

                <div class="row mx-n2 __min-h-200px">
                    {{-- <div class="col-lg-2 col-md-3 col-sm-4 col-6 px-2 pb-4 text-center">
                        <div class="card-body shadow position-relative">
                            <a href="https://6valley.6amtech.com/shopView/1">
                                <img class="__inline-66"
                                    onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'"
                                    src="https://6valley.6amtech.com/storage/app/public/shop/2022-04-21-6260f790349f7.png"
                                    alt="Deluxe Online">
                                <div class="text-center text-dark">
                                    <span class="text-center font-weight-bold small p-1">Deluxe Online</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6 px-2 pb-4 text-center">
                        <div class="card-body shadow position-relative">
                            <a href="https://6valley.6amtech.com/shopView/2">
                                <img class="__inline-66"
                                    onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'"
                                    src="https://6valley.6amtech.com/storage/app/public/shop/2022-04-21-6260f6e190f4c.png"
                                    alt="Mart Morning">
                                <div class="text-center text-dark">
                                    <span class="text-center font-weight-bold small p-1">Mart Morning</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6 px-2 pb-4 text-center">
                        <div class="card-body shadow position-relative">
                            <a href="https://6valley.6amtech.com/shopView/3">
                                <img class="__inline-66"
                                    onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'"
                                    src="https://6valley.6amtech.com/storage/app/public/shop/2022-04-21-6260f38e9ce54.png"
                                    alt="Wellness Fair">
                                <div class="text-center text-dark">
                                    <span class="text-center font-weight-bold small p-1">Wellness Fair</span>
                                </div>
                            </a>
                        </div>
                    </div> --}}

                    @foreach ($stores as $store)
                        <div class="col-lg-2 col-md-3 col-sm-4 col-6 px-2 pb-4 text-center">
                            <div class="card-body shadow position-relative">
                                @if ($store->status == 'inactive')
                                    <a href="{{ route('front.sellers.show',$store->id) }}">
                                        <span class="temporary-closed">
                                            <span>{{ __('Closed now')}}</span>
                                        </span>
                                    </a>
                                @endif

                                <a href="{{ route('front.sellers.show',$store->id) }}">
                                    <img class="__inline-66"
                                        onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'"
                                        src="{{ $store->image_path }}"
                                        alt="Bicycle Shop">
                                    <div class="text-center text-dark">
                                        <span class="text-center font-weight-bold small p-1">{{ $store->name }}</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach


                    {{-- <div class="col-lg-2 col-md-3 col-sm-4 col-6 px-2 pb-4 text-center">
                        <div class="card-body shadow position-relative">
                            <a href="https://6valley.6amtech.com/shopView/5">
                                <img class="__inline-66"
                                    onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'"
                                    src="https://6valley.6amtech.com/storage/app/public/shop/2022-04-21-6260f29f4a3bd.png"
                                    alt="KR Fashion">
                                <div class="text-center text-dark">
                                    <span class="text-center font-weight-bold small p-1">KR Fashion</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6 px-2 pb-4 text-center">
                        <div class="card-body shadow position-relative">
                            <a href="https://6valley.6amtech.com/shopView/6">
                                <img class="__inline-66"
                                    onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'"
                                    src="https://6valley.6amtech.com/storage/app/public/shop/2022-04-21-6260f23c79774.png"
                                    alt="Country Fair">
                                <div class="text-center text-dark">
                                    <span class="text-center font-weight-bold small p-1">Country Fair</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6 px-2 pb-4 text-center">
                        <div class="card-body shadow position-relative">
                            <a href="https://6valley.6amtech.com/shopView/7">
                                <img class="__inline-66"
                                    onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'"
                                    src="https://6valley.6amtech.com/storage/app/public/shop/2022-04-21-6260f1feb5be0.png"
                                    alt="Morning Mart">
                                <div class="text-center text-dark">
                                    <span class="text-center font-weight-bold small p-1">Morning Mart</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6 px-2 pb-4 text-center">
                        <div class="card-body shadow position-relative">
                            <a href="https://6valley.6amtech.com/shopView/8">
                                <span class="temporary-closed">
                                    <span>Closed now</span>
                                </span>
                            </a>
                            <a href="https://6valley.6amtech.com/shopView/8">
                                <img class="__inline-66"
                                    onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'"
                                    src="https://6valley.6amtech.com/storage/app/public/shop/2022-04-21-6260f140b5c50.png"
                                    alt="Royal Crown">
                                <div class="text-center text-dark">
                                    <span class="text-center font-weight-bold small p-1">Royal Crown</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6 px-2 pb-4 text-center">
                        <div class="card-body shadow position-relative">
                            <a href="https://6valley.6amtech.com/shopView/9">
                                <img class="__inline-66"
                                    onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'"
                                    src="https://6valley.6amtech.com/storage/app/public/shop/2022-04-23-626405e4d6205.png"
                                    alt="Super Store Online">
                                <div class="text-center text-dark">
                                    <span class="text-center font-weight-bold small p-1">Super Store On...</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6 px-2 pb-4 text-center">
                        <div class="card-body shadow position-relative">
                            <a href="https://6valley.6amtech.com/shopView/10">
                                <img class="__inline-66"
                                    onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'"
                                    src="https://6valley.6amtech.com/storage/app/public/shop/2022-10-12-63463d0b9a0da.png"
                                    alt="Digital Seller">
                                <div class="text-center text-dark">
                                    <span class="text-center font-weight-bold small p-1">Digital Seller</span>
                                </div>
                            </a>
                        </div>
                    </div> --}}
                </div>
                <div class="row mx-n2">
                    <div class="col-md-12">
                        <center>
                        </center>
                    </div>
                </div>
            </section>
        </div>
    </div>


</x-layout-front>
