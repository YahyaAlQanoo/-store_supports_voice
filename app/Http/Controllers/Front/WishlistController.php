<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use App\Http\Requests\StoreWishlistRequest;
use App\Http\Requests\UpdateWishlistRequest;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wishlists = Wishlist::where('user_id','=', Auth::id())->get();


        return view('Front.setting.wishlists.index',[
            'wishlists' => $wishlists
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
    public function store(StoreWishlistRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $result = Wishlist::where('user_id', Auth::id())->where('product_id', $id)->first();
        if (!$result) {
            $wishlist = new Wishlist();
            $wishlist->user_id = Auth::id();
            $wishlist->product_id = $id;
            $saved = $wishlist->save();
            if($saved) {
                return response()->json(['data'=> 'added into wishlist Is Successfully']);
            }
        }

        $deleted = Wishlist::destroy($result->id);
        if($deleted) {
            return response()->json(['data'=> 'remove from wishlist Is Successfully']);
        }

             return redirect()->route('front.products.show',$id);
 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWishlistRequest $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wishlist $wishlist)
    {
        $deleted = $wishlist->delete();
        if($deleted) {
            return redirect()->route('front.wishlist.index');

        }

    }
}
