<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductRatingController extends Controller
{
    public function rate(Request $request, Product $product)
    {
        if ($request->user()->hasRatedProduct($product)) {
            return redirect()->back()->with('error', 'You have already rated this product.');
        }



         $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'message' => 'required|string|min:5|max:300',
        ]);
 

        $rating = new ProductRating();

        $rating->product_id = $product->id;
        $rating->user_id = Auth::id();
        $rating->rating = $request->rating;
        $rating->message = $request->message;
        $rating->save();

        return redirect()->back()->with('success', 'Thank you for rating the product.');
    }}
