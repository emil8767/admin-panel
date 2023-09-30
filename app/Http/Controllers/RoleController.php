<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Role $role)
    {
        $roles = Role::orderBy('id')->paginate();
        return view('roles.index', ['roles' => $roles, 'role' => $role]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Role $role)
    {
        $this->authorize('create', $role);
        $permissions = Permission::all()->sortBy('id')
        ->mapWithKeys(function ($item, $key) {
            return [$item['id'] => $item['name']];
        })->all();
        return view('roles.create', ['role' => $role, 'permissions' => $permissions]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Role::class);
        $role = new Role();
        $data = $this->validate($request, [
            'name' => 'required|unique:roles',
            'description' => 'nullable',]);

        $role->fill($data);
        $role->save();
        $permissions = $request->input('permission_id');
        $role->permissions()->attach($permissions);
        return redirect()
            ->route('roles.index')->with('success', 'Role success create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view('roles.show', ['role' => $role]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $this->authorize('update', $role);
        $permissions = Permission::all()->sortBy('id')
        ->mapWithKeys(function ($item, $key) {
            return [$item['id'] => $item['name']];
        })->all();
        return view('roles.edit', ['permissions' => $permissions, 'role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $this->authorize('update', $role);
        $data = $this->validate($request, [
            'name' => 'required',
            'description' => 'nullable',
            'permission_id' => 'required']);

        $role->fill($data);
        $role->save();
        $permissions = $request->input('permission_id');
        $role->permissions()->attach($permissions);
        return redirect()
            ->route('roles.index')->with('success', 'Role success update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
    }
}
