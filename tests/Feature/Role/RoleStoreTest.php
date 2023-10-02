<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Permission;
use App\Models\User;
use App\Models\Role;

class RoleStoreTest extends TestCase
{
    use RefreshDatabase;

    public function testStoreAdmin(): void
    {
        $permissions = Permission::factory()->create(['id' => 1, 'name' => 'can create user']);
        $role = Role::factory()->create(['id' => 3])->permissions()->attach([1]);
        $user = User::factory()->create(['role_id' => 3]);
        $response = $this->actingAs($user)->post(route('roles.store'), ['id' => 2, 'name' => 'Novosib']);
        $response->assertRedirect('/roles');
    }

    public function testStoreNotAdmin(): void
    {
        $permissions = Permission::factory()->create(['id' => 1, 'name' => 'cannot']);
        $role = Role::factory()->create()->permissions()->attach([1]);
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post(route('roles.store'), ['name' => 'Novosib']);
        $response->assertStatus(403);
    }
}
