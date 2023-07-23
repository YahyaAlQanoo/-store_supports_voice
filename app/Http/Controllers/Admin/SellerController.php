<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('sellers.index');

        $sellers = User::where('type','seller')->get();
        return view('Admin.sellers.index',[
            'sellers' => $sellers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('sellers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('sellers.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Gate::authorize('sellers.view');

        $seller = User::findOrFail($id);
        // auth()->user()->withLastActivity()->get()
        // $order = Order::where('user_id','=',$customer->id)->first();
        // $orders = Order::where('user_id','=',$customer->id)->get();
        return view('Admin.sellers.show',[
            'seller' => $seller,
            // 'order' => $order,
            // 'orders' => $orders,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        Gate::authorize('sellers.update');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Gate::authorize('sellers.update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('sellers.delete');
    }
}
