<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\PDF;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::where('user_id','=', Auth::id())->get();


        return view('Front.setting.orders.index',[
            'orders' => $orders
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
        $item = OrderItem::where('order_id',$id)->sum('quantity');
        $order = Order::findOrFail($id);


        return view('Front.setting.orders.show',[
            'order' => $order,
            'items' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = OrderItem::where('order_id',$id)->sum('quantity');
        $order = Order::findOrFail($id);


        $pdf = app(PDF::class);
        $pdf->loadView('Front.setting.orders.print_invoice',[
            'order' => $order,
            'items' => $item
        ]);
        return $pdf->download('invoice.pdf');

    
    
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
