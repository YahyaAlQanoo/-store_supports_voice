<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductRating;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(12);

        return view('Front.products.index',[
            'products' => $products
        ]);
    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'product_id' => ['required', 'int', 'exists:products,id'],
        //     'quantity' => ['int', 'min:1', 'max:10'],
        // ]);


        // $cart = Cart::where([
        //     'cookie_id' => $this->getCookieId(),
        //     'product_id' => $request->input('product_id'),
        // ])->first();
        
        // if ($cart) {
        //     $cart->update([
        //         'user_id' => Auth::id(),
        //         'quantity' => $cart->quantity + $request->input('quantity', 1),
        //     ]);
        // } else {
        //     Cart::create([
        //         'cookie_id' => $this->getCookieId(),
        //         'user_id' => Auth::id(),
        //         'product_id' => $request->input('product_id'),
        //         'quantity' => $request->input('quantity', 1),
        //     ]);
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $similar_products = Product::where('category_id',$product->category_id)
            ->inRandomOrder()->limit(4)->get();

        $wishlist =  Wishlist::where('product_id',$product->id)->where('user_id',Auth::id())->count();

        $orderCount = OrderItem::where('product_id', $product->id)->count();

        $storeId = $product->store_id;
        $StoreCountRation = ProductRating::whereIn('product_id', function ($query) use ($storeId) {
            $query->select('id')
                ->from('products')
                ->where('store_id', $storeId);
        })
        ->count();

        $ratings = $product->ratings()->with('user')->get();
  
        return view('Front.products.show', [
            'ratings' => $ratings,
            'StoreCountRation' => $StoreCountRation,
            'product' => $product,
            'similar_products' => $similar_products,
            'wishlist' => $wishlist,
            'orderCount' => $orderCount,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
