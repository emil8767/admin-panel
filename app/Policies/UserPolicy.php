<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
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

    public function update(User $user, User $model): bool
    {
        $permissons = $user->role->permissions;
        $result = [];
        foreach ($permissons as $permisson) {
            $result[] = $permisson->name;
        }
        return in_array('can create user', $result);
    }
}
