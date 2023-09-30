<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
   
    public function index(User $user)
    {
        $users = User::orderBy('id')->paginate();
        return view('users.index', ['users' => $users, 'user' => $user]);   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {
        $this->authorize('create', $user);
        $roles = Role::all()->sortBy('id')
        ->mapWithKeys(function ($item, $key) {
            return [$item['id'] => $item['name']];
        })->all();
        $statuses = $user->statuses;
        return view('users.create', ['user' => $user, 'roles' => $roles, 'statuses' => $statuses]);
    }

    
    public function store(Request $request)
    {
        $this->authorize('create', User::class);
        $user = new User();
        $data = $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'phone' => 'nullable',
            'status' => 'required',
            'role_id' => 'required',]);
        $user->fill($data);
        $user->save();
        return redirect()
            ->route('users.index')->with('success', 'User success create');
    }

    
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);
        $roles = Role::all()->sortBy('id')
        ->mapWithKeys(function ($item, $key) {
            return [$item['id'] => $item['name']];
        })->all();
        return view('users.edit', ['user' => $user, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);
        $data = $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|',
            'phone' => 'nullable',
            'status' => 'required',
            'role_id' => 'required',]);
        $user->fill($data);
        $user->save();
        return redirect()
            ->route('users.index')->with('success', 'User success update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
