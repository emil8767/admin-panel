<?php

namespace App\Policies;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PermissionPolicy
{
    public function create(User $user): bool
    {
        $permissons = $user->role->permissions;
        $result = [];
        foreach ($permissons as $permisson) {
            $result[] = $permisson->name;
        }
        return in_array('can create user', $result);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Permission $permission): bool
    {
        $permissons = $user->role->permissions;
        $result = [];
        foreach ($permissons as $permisson) {
            $result[] = $permisson->name;
        }
        return in_array('can create user', $result);
    }
}
