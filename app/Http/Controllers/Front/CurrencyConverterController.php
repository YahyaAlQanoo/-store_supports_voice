<?php

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;
use App\Services\CurrencyConverter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

// use Illuminate\Contracts\Session\Session;

class CurrencyConverterController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'currency_code' => 'required|string|size:3',
        ]);

        $baseCurrencyCode = config('app.currency');
        $currencyCode = $request->input('currency_code');

        if($currencyCode == "ILS" ) {
            $response = Http::get("https://api.exchangerate-api.com/v4/latest/USD");
            $rate = ($response->ok()) ? $response['rates']['ILS'] : 0;
            Session::put('IlS_Value', $rate);
        }else {
            Session::put('IlS_Value',false);
        }

  




        Session::put('currency_code', $currencyCode);

        return redirect()->back();
    }
}
