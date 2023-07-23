<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProductRating;
use App\Models\Store;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stores = Store::all();
        return view('Front.sellers.index',[
            'stores' => $stores,
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $store = Store::findOrFail($id);
        $storeId = $store->id;

        $products = $store->products()->paginate(12);

        $categoriesWithProducts = Category::whereHas('products', function ($query) use ($storeId) {
            $query->where('store_id', $storeId);
        })->get();
        
        $StoreCountRation = ProductRating::whereIn('product_id', function ($query) use ($storeId) {
            $query->select('id')
                ->from('products')
                ->where('store_id', $storeId);
        })
        ->count();

        
        return view('Front.sellers.show',[
            'store' => $store,
            'StoreCountRation' => $StoreCountRation,
            'products' => $products,
            'categoriesWithProducts' => $categoriesWithProducts,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
