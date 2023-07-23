<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Support\Facades\Gate;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('orders.index');

        if (Auth::user()->type == "seller") {
            $seller = Auth::user();
            $store = Store::where('user_id', $seller->id)->first();
            $orders = Order::where('store_id',$store->id)->get();
        }
        if (Auth::user()->type == "admin") {
            $orders = Order::all();
        }

        return view('Admin.orders.index',[
            'orders' => $orders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('orders.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        Gate::authorize('orders.create');

    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        Gate::authorize('orders.view');

        return view('Admin.orders.show',[
            'order' => $order,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $status)
    {
        Gate::authorize('orders.update');

        if (Auth::user()->type == "seller") {
            $seller = Auth::user();
            $store = Store::where('user_id', $seller->id)->first();
            $orders = Order::where('store_id',$store->id)->where('status',$status)->get();
        }
        if (Auth::user()->type == "admin") {
            $orders = Order::where('status',$status)->get();
        }

        // $orders = Order::where('status',$status)->get();
        return view('Admin.orders.index',[
            'orders' => $orders,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        Gate::authorize('orders.update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        Gate::authorize('orders.delete');
    }
}
