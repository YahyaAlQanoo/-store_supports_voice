<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class CartController extends Controller
{

    public function index()
    {



        $cart = Cart::where('cookie_id', $this->getCookieId())->get();

        $total = $cart->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });

        return view('Front.carts.index',[
            'cart' => $cart,
            'total' => $total,
        ]);
    }






    /**
     * Store a newly created resource in storage.
     */




    public function store(Request $request)
    {
        $request->validate([
            'product_id' => ['required', 'int', 'exists:products,id'],
            'quantity' => ['int', 'min:1', 'max:10'],
        ]);


        $cart = Cart::where([
            'cookie_id' => $this->getCookieId(),
            'product_id' => $request->input('product_id'),
        ])->first();



        if ($cart) {
            $cart->update([
                'user_id' => Auth::id(),
                'quantity' => $cart->quantity + $request->input('quantity', 1),
            ]);
        } else {
            Cart::create([
                'cart_id' => Str::uuid(),
                'cookie_id' => $this->getCookieId(),
                'user_id' => Auth::id(),
                'product_id' => $request->input('product_id'),
                'quantity' => $request->input('quantity', 1),
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart.');

    }

        /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deleted = Cart::destroy($id);
         if($deleted) {
            return redirect()->route('front.home');
        }

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
