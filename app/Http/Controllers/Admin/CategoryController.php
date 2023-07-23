<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('categories.index');

        $categories = Category::with('parent_category')->get();
        return view('Admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('categories.create');

        $parents_categories = Category::all();
        return view('Admin.categories.create', compact('parents_categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        Gate::authorize('categories.create');

        $category = new Category();
        $category->name = $request->category_name;
        $category->description = $request->description;
        $category->status = $request->status;
        $category->parent_id = $request->parent_id;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image_name = time() . '_image_' . $category->name . '.' . $file->getClientOriginalExtension();
            $file->storeAs("category", $image_name , ['disk' => 'public']);
            $category->image = "category/" . $image_name;
        }

        $saved = $category->save();
        return redirect()->route('categories.index')
            ->with('success', 'Category created Successfully!');

    }

    public function show(string $status)
    {
        Gate::authorize('categories.view');

        $categories = Category::where('status',$status)->get();
        return view('Admin.categories.index',[
            'categories' => $categories ,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        Gate::authorize('categories.update');

        $parents_categories = Category::where('id', '<>', $category->id)
            ->orderBy('name', 'asc')
            ->get();
        return view('Admin.categories.edit', [
            'category' => $category,
            'parents_categories' => $parents_categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        Gate::authorize('categories.update');

        $category->name = $request->category_name;
        $category->description = $request->description;
        $category->status = $request->status;
        $category->parent_id = $request->parent_id;


        $old_image = $category->image;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image_name = time() . '_image_' . $category->name . '.' . $file->getClientOriginalExtension();
            $file->storeAs("category", $image_name , ['disk' => 'public']);
            $category->image = "category/" . $image_name;
            if ($category->image !== $old_image) {
                Storage::disk('public')->delete($old_image);
            }
        }
        $saved = $category->save();

        return redirect()->route('categories.index')
        ->with('success', 'Category updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Gate::authorize('categories.delete');

        $category->delete();
        Storage::disk('public')->delete($category->image);

        return redirect()->route('categories.index')
            ->with('success', 'Category deleted Successfully!');
    }
}
