<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->type == "seller") {
            $seller = Auth::user();
            $store = Store::where('user_id', $seller->id)->first();

             $orders = Order::where('store_id', $store->id)->get();
             
            $products = Product::where('store_id', $store->id)->get();
            $total_customers = Order::where('store_id', $store->id)->distinct('user_id')->count('user_id');
            $countPendingOrders = Order::where('store_id', $store->id)->where('status', 'Pending')->count();
            $countProcessingOrders = Order::where('store_id', $store->id)->where('status', 'Processing')->count();
            $countFailedOrders = Order::where('store_id', $store->id)->where('status', 'Failed')->count();
            $countDeliveringOrders = Order::where('store_id', $store->id)->where('status', 'Delivering')->count();
            $countCompletedOrders = Order::where('store_id', $store->id)->where('status', 'Completed')->count();

            // top 5 Customers in store
            $mostFrequentCustomers = Order::join('users', 'orders.user_id', '=', 'users.id')
            ->where('orders.store_id', $store->id) // Add condition for store_id
            ->select('users.id', 'users.name', 'users.image', DB::raw('COUNT(orders.id) as total_orders'), DB::raw('SUM(orders.total) as total_price'))
            ->groupBy('users.id', 'users.name', 'users.image')
            ->orderBy('total_orders', 'desc')
            ->take(5)
            ->get();
        
        }

        if (Auth::user()->type == "admin") {
            $admin = Auth::user();
            $orders = Order::all();
            $stores = Store::all();
            $products = Product::all();
            $total_customers = Order::count('user_id');
            $countPendingOrders = Order::where('status', 'Pending')->count();
            $countProcessingOrders = Order::where('status', 'Processing')->count();
            $countFailedOrders = Order::where('status', 'Failed')->count();
            $countDeliveringOrders = Order::where('status', 'Delivering')->count();
            $countCompletedOrders = Order::where('status', 'Completed')->count();

             // top 5 Customers in all stores
            $mostFrequentCustomers = Order::join('users', 'orders.user_id', '=', 'users.id')
            ->select('users.id', 'users.name', 'users.image', DB::raw('COUNT(orders.id) as total_orders'), DB::raw('SUM(orders.total) as total_price'))
            ->groupBy('users.id', 'users.name', 'users.image')
            ->orderBy('total_orders', 'desc')
            ->take(5)
            ->get();
        
        }

        

         

    // top 5 Stores in all store

    $mostFrequentStores = Order::join('stores', 'orders.store_id', '=', 'stores.id')
    ->select('stores.id', 'stores.name', 'stores.logo_image', DB::raw('COUNT(orders.id) as total_orders'),DB::raw('SUM(orders.total) as total_price'))
    ->groupBy('stores.id', 'stores.name', 'stores.logo_image')
    ->orderBy('total_orders', 'desc')
    ->take(5)
    ->get();



        return view('Admin.index',[
            'orders' => $orders ?? " ",
            'stores' => $stores ?? " ",
            'products' => $products ?? " ",
            'total_customers' => $total_customers,
            'countPendingOrders' => $countPendingOrders,
            'countProcessingOrders' => $countProcessingOrders,
            'countFailedOrders' => $countFailedOrders,
            'countDeliveringOrders' => $countDeliveringOrders,
            'countCompletedOrders' => $countCompletedOrders,
            'mostFrequentCustomers' => $mostFrequentCustomers,
            'mostFrequentStores' => $mostFrequentStores,
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
