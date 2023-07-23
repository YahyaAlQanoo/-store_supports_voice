<x-layout-front>


    {{ $header ?? ''}}
    <div class="container pb-5 mb-2 mb-md-4 rtl">
        <div class="row">

            <div class="sidebarR col-lg-3 col-md-3 pr-lg-3 pr-xl-4">

                <div class="__customer-sidebar" id="shop-sidebar">
                    <div>

                        <div class="widget-title">
                            <a class="" href="{{ route('front.orders.index') }}">{{ __('My order')}}</a>
                        </div>
                    </div>
                    <div>

                        <div class="widget-title">
                            <a class="" href="{{ route('front.wishlist.index') }}">{{ __('Wish List')}} </a>
                        </div>
                    </div>




                     <div>

                        <div class="widget-title">
                            <a class="active-menu" href="#">
                                {{ __('Profile Info')}}
                            </a>
                        </div>
                    </div>


                    <div>

                        <div class="widget-title">
                            <a class="" href="{{ route('front.tickets.index') }}">{{ __('Support Ticket')}}</a>
                        </div>
                    </div>
                </div>
            </div>

 {{$slot}}
        </div>
    </div>


</x-layout-front>
