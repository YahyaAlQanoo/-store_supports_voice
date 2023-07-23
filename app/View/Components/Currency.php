<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\View\Component;
use NumberFormatter;

class Currency extends Component
{
    public $amount;
    public $currencyCode;
    public $finalResult;

    public function __construct($amount)
    {
        $currencyCode = Session::get('currency_code', 'ILS');
        $IlS_Value = Session::get('IlS_Value');

        $this->currencyCode = $currencyCode;

        $this->amount = $amount;
         
        if ($currencyCode == 'ILS' ) {
            $rate = $IlS_Value;
            $this->finalResult = $amount * $rate;
        } else {
            $this->finalResult = $amount;
        }


    }

    public function render(): View|Closure|string
    {
        $convertedAmount = $this->finalResult;
        $currencySymbol = ($this->currencyCode === 'ILS') ? '₪' : '$';
        $displayAmount = $currencySymbol . ' ' . $convertedAmount;

        return view('components.currency', compact('displayAmount'));
    }
}
