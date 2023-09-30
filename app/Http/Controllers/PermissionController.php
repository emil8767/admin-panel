<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Permission $permission)
    {
        $permissions = Permission::orderBy('id')->paginate();
        return view('permissions.index', ['permissions' => $permissions, 'permission' => $permission]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Permission $permission)
    {
        $this->authorize('create', $permission);
        return view('permissions.create', ['permission' => $permission]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Permission::class);
        $permission = new Permission();
        $data = $this->validate($request, [
            'name' => 'required|unique:permissions',
            'description' => 'nullable']);

        $permission->fill($data);
        $permission->save();
        return redirect()
            ->route('permissions.index')->with('success', 'Permission success create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        //
    }
}
