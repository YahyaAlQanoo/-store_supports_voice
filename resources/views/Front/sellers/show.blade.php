<x-layout-front>

    <div class="container pb-5 mb-2 mb-md-4 __inline-67">

        <div class="row rtl">

            <div class="col-lg-12 mt-2">
                <div class="bg-white">
                    <img class="__shop-page-banner"
                        src="{{ $store->cover_path }}"
                        onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'"
                        alt>
                </div>
            </div>
            <div class="col-md-12 mt-2 rtl" style=" text-align: left;">
                <a class="openbtn-tab __text-20px font-semibold" onclick="openNav()">
                    <div style="text-align: left" class="for-tab-display"> ☰ {{ __('Categories')}}</div>
                </a>
            </div>
            <div class="col-lg-12 rtl" style="text-align: left;">
                <div class="__rounded-10 bg-white" style="padding-left:5px;">
                    <div class="row d-flex justify-content-between seller-details">
                        <div class="d-flex align-items-start p-2">
                            <div class>
                                <div class="position-relative">
                                    <img class="__inline-68"
                                        src="{{ $store->image_path }}"
                                        onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'"
                                        alt>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <span class="ml-4 font-weight-bold ">
                                    {{ $store->name }}
                                </span>
                                <div class="ml-4">
                                    <div>
                                        <i class="fas fa-star active" style="color: #fea569 !important;"></i>
                                        <i class="fas fa-star active" style="color: #fea569 !important;"></i>
                                        <i class="fas fa-star active" style="color: #fea569 !important;"></i>
                                        <i class="fas fa-star active" style="color: #fea569 !important;"></i>
                                        <i class="fas fa-star active" style="color: #fea569 !important;"></i>
                                                            (<span class="ml-1">4.5</span>)
                                    </div>
                                    <div class="d-flex __text-12px">
                                        <span>{{ $StoreCountRation }}  {{__('  Reviews')}}</span>
                                        <span class="__inline-69"></span>
                                        <span>{{ $store->orders->count() }} {{ __('Orders')}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="mr-4">
                                <div class="d-flex">
                                    <a href="https://6valley.6amtech.com/customer/auth/login"
                                        class="btn btn-block __inline-70">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                        {{ __('Chat with seller')}}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="card-header">
                                {{ __('Write something')}}
                            </div>
                            <div class="modal-body">
                                <form action="https://6valley.6amtech.com/messages-store" method="post" id="chat-form">
                                    <input type="hidden" name="_token"
                                        value="UEFazQRLMGhwSVNAJzvuWqQ5GEpm1jzohXWBzVy8"> <input value="2"
                                        name="shop_id" hidden>
                                    <input value="2}" name="seller_id" hidden>
                                    <textarea name="message" class="form-control" required></textarea>
                                    <br>
                                    <button class="btn btn--primary text-white">{{ __('Send')}}</button>
                                </form>
                            </div>
                            <div class="card-footer justify-content-between d-flex flex-wrap">
                                <a href="https://6valley.6amtech.com/chat/seller" class="btn btn--primary">
                                    {{ __('Go to Chatbox')}}
                                </a>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close')}}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-1 mr-0 rtl">
            <div class="col-lg-3 mt-3  mr-0 pr-4">
                <aside class=" hidden-xs SearchParameters" id="SearchParameters">

                    <div class=" rounded-lg " id="shop-sidebar">
                        <div class>

                            <div class="widget widget-categories mb-4 ">
                                <div>
                                    <div class="d-inline">
                                        <h3 class="widget-title font-bold __text-18px d-inline">{{ __('Categories')}}</h3>
                                    </div>
                                </div>
                                <div class="accordion mt-2" id="shop-categories">
                                    @foreach ($categoriesWithProducts as $category)
                                        <div class="card __inline-71">
                                            <div class="card-header p-1 flex-between">
                                                <div class="d-flex ">
                                                    <img class="__inline-72 mr-2"
                                                        onerror="this.src='https://6valley.6amtech.com/public/assets/front-end/img/image-place-holder.png'"
                                                        src="{{ $category->image_path }}">
                                                    <label class="for-hover-lable cursor-pointer">
                                                        {{-- onclick="location.href='https://6valley.6amtech.com/shopView/2?category_id=28'" --}}
                                                        {{ $category->name }}
                                                    </label>
                                                </div>


                                            </div>
                                            <div class="card-body ml-2" id="collapse-28" style="display: none">
                                            </div>
                                        </div>

                                        {{-- @if ($category->child_category && $category->child_category[0]->parent_id == $category->id)
                                            {{$category->child_category}}
                                        @endif --}}


                                    @endforeach






                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
            {{-- <div id="mySidepanel" class="sidepanel" style="text-align: right:auto; left:0;">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
                <div class="cz-sidebar-body">
                    <div class="widget widget-categories mb-4 pb-4 border-bottom">
                        <div>
                            <div class="d-inline">
                                <h3 class="widget-title font-700 d-inline">Categories</h3>
                            </div>
                        </div>
                        <div class="divider-role __inline-73"></div>
                        <div class="accordion mt-n1" id="shop-categories" style="text-align: left;">
                            <div class="card">
                                <div class="card-header p-1 flex-between">
                                    <label class="for-hover-lable cursor-pointer"
                                        onclick="location.href='https://6valley.6amtech.com/shopView/2?category_id=28'">
                                        Home, Pet &amp; Appliances
                                    </label>
                                    <strong class="pull-right for-brand-hover cursor-pointer"
                                        onclick="$('#collapse-m-28').toggle(400)">
                                    </strong>
                                </div>
                                <div class="card-body ml-2" id="collapse-m-28" style="display: none">
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header p-1 flex-between">
                                    <label class="for-hover-lable cursor-pointer"
                                        onclick="location.href='https://6valley.6amtech.com/shopView/2?category_id=34'">
                                        eBook
                                    </label>
                                    <strong class="pull-right for-brand-hover cursor-pointer"
                                        onclick="$('#collapse-m-34').toggle(400)">
                                        +
                                    </strong>
                                </div>
                                <div class="card-body ml-2" id="collapse-m-34" style="display: none">
                                    <div class=" for-hover-lable card-header p-1 flex-between">
                                        <label class="cursor-pointer"
                                            onclick="location.href='https://6valley.6amtech.com/shopView/2?category_id=36'">
                                            Cooking Recipe
                                        </label>
                                        <strong class="pull-right cursor-pointer"
                                            onclick="$('#collapse-m-36').toggle(400)">
                                        </strong>
                                    </div>
                                    <div class="card-body ml-2" id="collapse-m-36" style="display: none">
                                    </div>
                                    <div class=" for-hover-lable card-header p-1 flex-between">
                                        <label class="cursor-pointer"
                                            onclick="location.href='https://6valley.6amtech.com/shopView/2?category_id=35'">
                                            Story Book
                                        </label>
                                        <strong class="pull-right cursor-pointer"
                                            onclick="$('#collapse-m-35').toggle(400)">
                                            +
                                        </strong>
                                    </div>
                                    <div class="card-body ml-2" id="collapse-m-35" style="display: none">
                                        <div class="card-header p-1 flex-between">
                                            <label class="for-hover-lable cursor-pointer"
                                                onclick="location.href='https://6valley.6amtech.com/shopView/2?category_id=37'">
                                                Comic Book
                                            </label>
                                        </div>
                                        <div class="card-header p-1 flex-between">
                                            <label class="for-hover-lable cursor-pointer"
                                                onclick="location.href='https://6valley.6amtech.com/shopView/2?category_id=38'">
                                                Biography
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header p-1 flex-between">
                                    <label class="for-hover-lable cursor-pointer"
                                        onclick="location.href='https://6valley.6amtech.com/shopView/2?category_id=39'">
                                        Applications
                                    </label>
                                    <strong class="pull-right for-brand-hover cursor-pointer"
                                        onclick="$('#collapse-m-39').toggle(400)">
                                    </strong>
                                </div>
                                <div class="card-body ml-2" id="collapse-m-39" style="display: none">
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header p-1 flex-between">
                                    <label class="for-hover-lable cursor-pointer"
                                        onclick="location.href='https://6valley.6amtech.com/shopView/2?category_id=11'">
                                        Women&#039;s fashion
                                    </label>
                                    <strong class="pull-right for-brand-hover cursor-pointer"
                                        onclick="$('#collapse-m-11').toggle(400)">
                                        +
                                    </strong>
                                </div>
                                <div class="card-body ml-2" id="collapse-m-11" style="display: none">
                                    <div class=" for-hover-lable card-header p-1 flex-between">
                                        <label class="cursor-pointer"
                                            onclick="location.href='https://6valley.6amtech.com/shopView/2?category_id=18'">
                                            Dress
                                        </label>
                                        <strong class="pull-right cursor-pointer"
                                            onclick="$('#collapse-m-18').toggle(400)">
                                        </strong>
                                    </div>
                                    <div class="card-body ml-2" id="collapse-m-18" style="display: none">
                                    </div>
                                    <div class=" for-hover-lable card-header p-1 flex-between">
                                        <label class="cursor-pointer"
                                            onclick="location.href='https://6valley.6amtech.com/shopView/2?category_id=17'">
                                            Shoes
                                        </label>
                                        <strong class="pull-right cursor-pointer"
                                            onclick="$('#collapse-m-17').toggle(400)">
                                            +
                                        </strong>
                                    </div>
                                    <div class="card-body ml-2" id="collapse-m-17" style="display: none">
                                        <div class="card-header p-1 flex-between">
                                            <label class="for-hover-lable cursor-pointer"
                                                onclick="location.href='https://6valley.6amtech.com/shopView/2?category_id=21'">
                                                regular wear
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header p-1 flex-between">
                                    <label class="for-hover-lable cursor-pointer"
                                        onclick="location.href='https://6valley.6amtech.com/shopView/2?category_id=12'">
                                        Men&#039;s fashion
                                    </label>
                                    <strong class="pull-right for-brand-hover cursor-pointer"
                                        onclick="$('#collapse-m-12').toggle(400)">
                                    </strong>
                                </div>
                                <div class="card-body ml-2" id="collapse-m-12" style="display: none">
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header p-1 flex-between">
                                    <label class="for-hover-lable cursor-pointer"
                                        onclick="location.href='https://6valley.6amtech.com/shopView/2?category_id=13'">
                                        Outdoor Fun &amp; Sports
                                    </label>
                                    <strong class="pull-right for-brand-hover cursor-pointer"
                                        onclick="$('#collapse-m-13').toggle(400)">
                                    </strong>
                                </div>
                                <div class="card-body ml-2" id="collapse-m-13" style="display: none">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col-lg-9 product-div">
                <div class="row d-flex justify-content-end">
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12 pt-2 __dir-ltr">
                        <form class=" md-form form-sm mt-0" method="get"
                            action="https://6valley.6amtech.com/shopView/2">
                            <div class="input-group input-group-sm mb-3">
                                <input type="text" class="form-control" name="product_name"
                                    style="text-align: left;" placeholder="Search products from this store"
                                    aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button type="submit" class="input-group-text __bg-F3F5F9" id="basic-addon2">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row" id="ajax-products">



                    @foreach ($products  as $product)
                        <div class=" col-lg-2 col-md-3 col-sm-4 col-6 col-lg-3 col-md-4 col-sm-4 col-6 mb-2 p-2">
                            <x-product-card :product="$product" />
                        </div>
                    @endforeach
                    <div class="col-12">
                        <nav class="d-flex justify-content-between pt-2" aria-label="Page navigation" id="paginator-ajax"> </nav>
                    </div>
                </div>{{ $products->links() }}

            </div>
        </div>
    </div>

</x-layout-front>
