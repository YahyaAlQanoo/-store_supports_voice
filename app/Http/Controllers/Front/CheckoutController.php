<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Symfony\Component\Intl\Countries;
use Throwable;

class CheckoutController extends Controller
{
    public function create()
    {
        $cart = Cart::where('cookie_id','=', $this->getCookieId())->get();
        $total =  $cart->sum(function($item) {
            return $item->quantity * $item->product->price  ;
        });

        return view('Front.checkout.create', [
            'cart' => $cart,
            'total' => $total,
            'user' => Auth::check()? Auth::user() : new User(),
            'countries' => Countries::getNames('ar'),
        ]);
    }

    public function store(Request $request)
    {

 



        $request->validate([
            'billing_firstname' => 'required',
            'billing_lastname' => 'required',
            'billing_email' => 'required|email',
            'billing_phone' => 'required',
            'billing_address' => 'required',
            'billing_city' => 'required',
            'billing_postalcode' => 'required',
            'billing_country' => 'required',
        ]);

        $cart = Cart::where('cookie_id','=', $this->getCookieId())->get();
        $total =  $cart->sum(function($item) {
            return $item->quantity * $item->product->price  ;
        });


        $request->merge([
            'user_id' => Auth::id(),
            'total' => $total,
        ]);

        DB::beginTransaction();
        try {
            $order = Order::create($request->all());
            foreach ($cart as $item) {
                $order->items()->create([
                    'product_id' => $item->product_id,
                    'product_name' => $item->product->name,
                    'price' => $item->product->price,
                    'quantity' => $item->quantity,
                ]);
            }

            Cart::where('cookie_id', $this->getCookieId())->delete();

            DB::commit();

        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
         return Redirect::route('orders.show', $order->id);
        
    }

    protected function getCookieId()
    {
        $cookie_id = Cookie::get('cart_cookie_id');
        if (!$cookie_id) {
            $cookie_id = Str::uuid();
            Cookie::queue('cart_cookie_id', $cookie_id, 60 * 24 * 30);
        }
        return $cookie_id;
    }
}
