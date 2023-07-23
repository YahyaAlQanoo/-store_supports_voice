<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $last_products = Product::latest()->take(8)->get();
        $categories = Category::take(10)->get();
        $stores = Store::take(10)->get();

        $popular_categories = Category::withCount('products')
        ->orderByDesc('products_count')
        ->limit(4)
        ->get();
        $products =  Product::take(20)->get();


        return view('front.home', [
            'products' => $products,
            'last_products' => $last_products,
            'categories' => $categories,
            'popular_categories' => $popular_categories,
            'stores' => $stores
        ]);
    }

        /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);

        return view('Front.categories.show',[
            'category' => $category
        ]);
    }





}
