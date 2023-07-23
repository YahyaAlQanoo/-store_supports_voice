<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Document</title>

    <style>
        body {
            margin-top: 20px;
            color: #2e323c;
            background: #f5f6fa;
            position: relative;
            height: 100%;
            font-family: sans-serif
        }

        .invoice-container {
            padding: 1rem;
        }

        .invoice-container .invoice-header .invoice-logo {
            margin: 0.8rem 0 0 0;
            display: inline-block;
            font-size: 1.6rem;
            font-weight: 700;
            color: #2e323c;
        }

        .invoice-container .invoice-header .invoice-logo img {
            max-width: 130px;
        }

        .invoice-container .invoice-header address {
            font-size: 0.8rem;
            color: #9fa8b9;
            margin: 0;
        }

        .invoice-container .invoice-details {
            margin: 1rem 0 0 0;
            padding: 1rem;
            line-height: 180%;
            background: #f5f6fa;
        }

        .invoice-container .invoice-details .invoice-num {
            text-align: right;
            font-size: 0.8rem;
        }

        .invoice-container .invoice-body {
            padding: 1rem 0 0 0;
        }

        .invoice-container .invoice-footer {
            text-align: center;
            font-size: 0.7rem;
            margin: 5px 0 0 0;
        }

        .invoice-status {
            text-align: center;
            padding: 1rem;
            background: #ffffff;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            margin-bottom: 1rem;
        }

        .invoice-status h2.status {
            margin: 0 0 0.8rem 0;
        }

        .invoice-status h5.status-title {
            margin: 0 0 0.8rem 0;
            color: #9fa8b9;
        }

        .invoice-status p.status-type {
            margin: 0.5rem 0 0 0;
            padding: 0;
            line-height: 150%;
        }

        .invoice-status i {
            font-size: 1.5rem;
            margin: 0 0 1rem 0;
            display: inline-block;
            padding: 1rem;
            background: #f5f6fa;
            -webkit-border-radius: 50px;
            -moz-border-radius: 50px;
            border-radius: 50px;
        }

        .invoice-status .badge {
            text-transform: uppercase;
        }

        @media (max-width: 767px) {
            .invoice-container {
                padding: 1rem;
            }
        }


        .custom-table {
            border: 1px solid #e0e3ec;
        }

        .custom-table thead {
            background: #007ae1;
        }

        .custom-table thead th {
            border: 0;
            color: #ffffff;
        }

        .custom-table>tbody tr:hover {
            background: #fafafa;
        }

        .custom-table>tbody tr:nth-of-type(even) {
            background-color: #ffffff;
        }

        .custom-table>tbody td {
            border: 1px solid #e6e9f0;
        }


        .card {
            background: #ffffff;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            border: 0;
            margin-bottom: 1rem;
        }

        .text-success {
            color: #00bb42 !important;
        }

        .text-muted {
            color: #9fa8b9 !important;
        }

        .custom-actions-btns {
            margin: auto;
            display: flex;
            justify-content: flex-end;
        }

        .custom-actions-btns .btn {
            margin: .3rem 0 .3rem .3rem;
        }
        td , th {
            padding: 10px
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="invoice-container">
                            <div class="invoice-header">
                                <!-- Row start -->
                                {{-- <div class="row gutters">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="custom-actions-btns mb-5">
                                                <a href="#" class="btn btn-primary">
                                                    <i class="icon-download"></i> Download
                                                </a>
                                                <a href="#" class="btn btn-secondary">
                                                    <i class="icon-printer"></i> Print
                                                </a>
                                            </div>
                                        </div>
                                    </div> --}}
                                <div class="row gutters">
                                    <table>
                                    <thead>
                                        <tr>
                                            <td>
                                                <a href="{{ route('front.home') }}"  class="invoice-logo">
                                                    {{ __('Madrid Store')}}
                                                </a>

                                            </td>
                                            <td>   .......................................................................................................................................  </td>
                                            <td>
                                                <address class="text-right">
                                                    Santiago Bernabéu Stadium Street.<br>
                                                    Santiago Bernabéu Stadium , Madrid, Spain.<br>
                                                    +970592205023
                                                </address>
                                            </td>
                                        </tr>
                                    </thead>
                                    </table>
                                </div>

                                {{-- <div class="row gutters">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <a href="{{ route('front.home') }}" class="invoice-logo">
                                            Madrid Store
                                        </a>

                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <address class="text-right">
                                            Santiago Bernabéu Stadium Street.<br>
                                            Santiago Bernabéu Stadium , Madrid, Spain.<br>
                                            +970592205023
                                        </address>
                                    </div>
                                </div> --}}

                                <div class="row gutters">
                                <table>
                                <thead>
                                    <tr>
                                        <td>

                                        <div class="invoice-details gutters">
                                            <address>
                                                {{ Auth::user()->name }}<br>
                                                {{ $order->billing_address }}, {{ $order->billing_city }},
                                                {{ $order->billing_country }}
                                            </address>
                                        </div>
                                        </td>
                                        <td>


                                        <div class="invoice-details gutters">
                                            <div class="invoice-num">
                                                <div>Invoice - #{{ $order->number }}</div>
                                                <div>{{ \Carbon\Carbon::parse($order->created_at)->format('d M, Y') }}
                                                </div>
                                            </div>
                                        </div>                                        </td>

                                    </tr>
                                </thead>
                                </table>

                                    </div>
                                </div>

                            </div>
                            <div class="invoice-body">

                                <div class="row gutters">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table custom-table m-0">
                                                <thead>
                                                    <tr>
                                                        <th>{{ __('Items')}}</th>
                                                        <th>{{ __('Unit Price')}}</th>
                                                        <th>{{ __('Quantity')}}</th>
                                                        <th> {{ __('Total')}}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($order->items as $item)
                                                        <tr>

                                                            <td>
                                                                {{ $item->product->name }}
                                                                <p class="m-0 text-muted">
                                                                    {{ $item->product->description }}
                                                                </p>
                                                            </td>
                                                            <td> ${{ $item->price }}</td>
                                                            <td>{{ $item->quantity }}</td>
                                                            <td> $ {{ $item->price * $item->quantity }} </td>
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td colspan="2">
                                                            <p>
                                                                {{ __('Subtotal')}}<br>
                                                                {{ __('Shipping')}} &amp; {{ __('Handling')}}<br>
                                                                {{ __('Tax')}}<br>
                                                            </p>
                                                            <h5 class="text-success"><strong>{{ __('Grand Total')}}</strong></h5>
                                                        </td>
                                                        <td>
                                                            <p>
                                                                ${{ $order->total }} <br>
                                                                0 <br>
                                                                0<br>
                                                            </p>
                                                            <h5 class="text-success">
                                                                <strong>${{ $order->total }}</strong></h5>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="invoice-footer " style="margin-top: 35px">
                                <center>                                    <small>


                                {{ __('Thank you for your Business.')}}<br>
                                {{ __('Phone')}} : +970592205023 <br>
                                {{ __('Email')}} : Copy@madrid.com<br>
                                {{ __('Website')}} : https://madrid.com<br>
                                {{ __('All copy right reserved © 2023 madrid')}}<br>
                                                                   </small>
 </center>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
