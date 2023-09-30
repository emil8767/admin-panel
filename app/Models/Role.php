<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;
use App\Models\User;

class Role extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_roles', 'role_id', 'permission_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }
}
