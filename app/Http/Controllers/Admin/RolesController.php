<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('roles.index');

        $roles = Role::paginate();
        return view('Admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('roles.create');

        return view('Admin.roles.create', [
            'role' => new Role(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('roles.create');

        $request->validate([
            'name' => 'required|string|max:255',
            'abilities' => 'required|array',
        ]);

        $role = Role::createWithAbilities($request);

        return redirect()
            ->route('roles.index')
            ->with('success', 'Role created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Gate::authorize('roles.view');

        $role = Role::findOrFail($id);
        $role_abilities = $role->abilities()->pluck('type', 'ability')->toArray();
            
        return view('Admin.roles.edit', compact('role', 'role_abilities'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        Gate::authorize('roles.update');

        $role = Role::findOrFail($id);
        $role_abilities = $role->abilities()->pluck('type', 'ability')->toArray();
         
        return view('Admin.roles.edit', compact('role', 'role_abilities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Gate::authorize('roles.update');

        $request->validate([
            'name' => 'required|string|max:255',
            'abilities' => 'required|array',
        ]);
        
        $role = Role::findOrFail($id);
        $role->updateWithAbilities($request);
        
        return redirect()
            ->route('roles.index')
            ->with('success', 'Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('roles.delete');
 
        $role = Role::findOrFail($id);
        $role->delete();
        
        // Storage::disk('public')->delete($user->image);

        return redirect()->route('roles.index')
            ->with('success', 'deleted role Successfully!');

    }
}
