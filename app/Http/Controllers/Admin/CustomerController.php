<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('customers.index');

        $customers = User::where('type','user')->get();
        return view('Admin.customers.index',[
            'customers' => $customers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('customers.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Gate::authorize('customers.view');

        $customer = User::findOrFail($id);
        $order = Order::where('user_id','=',$customer->id)->first();
        $orders = Order::where('user_id','=',$customer->id)->get();
        return view('Admin.customers.show',[
            'customer' => $customer,
            'order' => $order,
            'orders' => $orders,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        Gate::authorize('customers.update');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, string $id)
    {
        Gate::authorize('customers.update');

        $user = User::findOrFail($id);
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;


        $old_image = $user->image;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image_name = time() . '_image_' . $user->name . '.' . $file->getClientOriginalExtension();
            $file->storeAs("users", $image_name , ['disk' => 'public']);
            $user->image = "users/" . $image_name;
            if ($user->image !== $old_image) {
                Storage::disk('public')->delete($old_image);
            }
        }
        $saved = $user->save();

        return redirect()->route('customers.show',$user->id)
        ->with('success', 'Customer ory updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('customers.delete');
        $user = User::findOrFail($id);
        $user->delete();
        
        // Storage::disk('public')->delete($user->image);

        return redirect()->route('customers.index')
            ->with('success', 'deleted customers Successfully!');

    }
}
