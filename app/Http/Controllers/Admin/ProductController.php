<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Store;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{

    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('products.index');

        if (Auth::user()->type == "seller") {
            $seller = Auth::user();
            $store = Store::where('user_id', $seller->id)->first();
            $products = Product::where('store_id',$store->id)->get();
        }
        if (Auth::user()->type == "admin") {
            $products = Product::all();
        }

        return view('Admin.products.index',[
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('products.create');

        return view('Admin.products.create',[
            'categories' => Category::all(),
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        Gate::authorize('products.create');

        // dd($request->all());
        $product = new Product();
        $product->name = $request->product_name;
        $product->description = $request->description;
        $product->status = $request->status;
        $product->category_id = $request->category_id;
        $product->store_id = 1;
        $product->quantity = 10;
        $product->price = $request->price;
        $product->previous_price = $request->previous_price;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image_name = time() . '_image_' . $product->name . '.' . $file->getClientOriginalExtension();
            $file->storeAs("product", $image_name , ['disk' => 'public']);
            $product->image = "product/" . $image_name;
        }
        $saved = $product->save();
        if ($saved) {
            if ($request->hasFile('gallary')) {
                $i=0;
                 foreach ( $request->file('gallary') as $file ) {
                    $image_name = time() . '_image_' . $product->name . ++$i . '.' . $file->getClientOriginalExtension();
                    $file->storeAs("product", $image_name , ['disk' => 'public']);

                    $product->gallaries()->create([
                        'images' => "product/" . $image_name,
                    ]);
                 }
            }
    
        }
         return redirect()->route('products.index')
            ->with('success', 'Product Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $status)
    {
        Gate::authorize('products.view');


        if (Auth::user()->type == "seller") {
            $seller = Auth::user();
            $store = Store::where('user_id', $seller->id)->first();
            $products = Product::where('store_id',$store->id)->where('status',$status)->get();
        }
        if (Auth::user()->type == "admin") {
            $products = Product::where('status',$status)->get();
        }

        return view('Admin.products.index',[
            'products' => $products ,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        Gate::authorize('products.update');

        return view('Admin.products.edit', [
            'product' => $product,
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        Gate::authorize('products.update');


         $product->name = $request->product_name;
        $product->description = $request->description;
        $product->status = $request->status;
        $product->category_id = $request->category_id;
        $product->store_id = 1;
        $product->price = $request->price;

        $old_image = $product->image;
        $old_gallary = $product->gallaries;


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image_name = time() . '_image_' . $product->name . '.' . $file->getClientOriginalExtension();
            $file->storeAs("product", $image_name , ['disk' => 'public']);
            $product->image = "product/" . $image_name;
            if ($product->image !== $old_image) {
                Storage::disk('public')->delete($old_image);
            }
        }

        // dd($product,$request->all());
        $saved = $product->save();
        // return $saved;
        if ($saved) {
            if ($request->hasFile('gallary')) {
                $product->gallaries()->delete();
                $i=0;
                foreach ( $request->file('gallary') as $file ) {
                    $image_name = time() . '_image_' . $product->name . ++$i . '.' . $file->getClientOriginalExtension();
                    $file->storeAs("product", $image_name , ['disk' => 'public']);

                    $product->gallaries()->create([
                        'images' => "product/" . $image_name,
                    ]);
                }
                // dd($old_gallary);
                foreach ( $old_gallary as $file ) {
                    Storage::disk('public')->delete($file->images);
                }
                
                // dd($old_gallary);


            }
    
        }
         return redirect()->route('products.index')
            ->with('success', 'Category updated  Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Gate::authorize('products.delete');

         // dd($product->gallaries->count());
        foreach ( $product->gallaries as $file ) {
            Storage::disk('public')->delete($file->images);
        }
        $product->gallaries()->delete();

        $product->delete();
        Storage::disk('public')->delete($product->image);

        return redirect()->route('products.index')
            ->with('success', 'Category deleted Successfully!');
    }
}
