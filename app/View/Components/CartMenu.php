<?php

namespace App\View\Components;

use App\Models\Cart;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cookie;
use Illuminate\View\Component;
use Illuminate\Support\Str;

class CartMenu extends Component
{

    public $cart;
    public $total;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $cookie_id = Cookie::get('cart_cookie_id');
        if (!$cookie_id) {
            $cookie_id = Str::uuid();
            Cookie::queue('cart_cookie_id', $cookie_id, 60 * 24 * 30);
        }

        $this->cart = Cart::where('cookie_id','=', $cookie_id)->get();
        $this->total = $this->cart->sum(function($item) {
            // return $item->quantity * $item->product->price  ;
        });
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cart-menu');
    }
}
