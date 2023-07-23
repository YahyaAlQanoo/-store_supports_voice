<x-menu-setting>
    <x-slot:header>
        <div class="container text-center">
            <h3 class="headerTitle my-3">{{ __('My order')}}</h3>
        </div>

    </x-slot:header>
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> {{ __('Alert')}}!</h5>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <section class="col-lg-9 col-md-9">
        <div class="card __card shadow-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table __table text-center">
                        <thead class="thead-light">
                            <tr>
                                <td class="tdBorder">
                                    <div class="py-2"><span class="d-block spandHeadO ">{{ __('Order ID')}}</span></div>
                                </td>
                                <td class="tdBorder orderDate">
                                    <div class="py-2"><span class="d-block spandHeadO">{{ __('Order Date')}}</span>
                                    </div>
                                </td>
                                <td class="tdBorder">
                                    <div class="py-2"><span class="d-block spandHeadO"> {{ __('Status')}}</span></div>
                                </td>
                                <td class="tdBorder">
                                    <div class="py-2"><span class="d-block spandHeadO"> {{ __('Total')}}</span></div>
                                </td>
                                <td class="tdBorder">
                                    <div class="py-2"><span class="d-block spandHeadO"> {{ __('Action')}}</span></div>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                             <tr>
                                <td class="bodytr font-weight-bold">
                                    ID: {{ $order->number }}
                                </td>
                                <td class="bodytr orderDate"><span class="">{{$order->created_at }}</span></td>
                                <td class="bodytr">
                                    <span class="badge badge-info text-capitalize">
                                        {{ $order->status }}
                                    </span>
                                </td>
                                <td class="bodytr">
                                    <x-currency :amount="$order->total" />
                                </td>
                                <td class="bodytr">
                                    <div class="__btn-grp-sm flex-nowrap">
                                        <a href="{{ route('front.orders.show',$order->id)}}"
                                            class="btn btn--primary __action-btn" title="View">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ route('front.orders.destroy',$order->id)}}" title="Cancel"
                                            onclick="route_alert('https://6valley.6amtech.com/order-cancel/100185','Want to cancel this order ')"
                                            class="btn btn-danger __action-btn">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="card-footer border-0">
                    </div>
                </div>
            </div>
        </div>
    </section>



</x-menu-setting>
