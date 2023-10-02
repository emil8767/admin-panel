<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Permission;
use App\Models\User;
use App\Models\Role;

class RoleUpdateTest extends TestCase
{
    use RefreshDatabase;

    public function testUpdateRoleAdminValid(): void
    {
        $permissions = Permission::factory()->create(['id' => 1, 'name' => 'can create user']);
        $role = Role::factory()->create(['id' => 1, 'name' => 'hello'])->permissions()->attach([1]);
        $user = User::factory()->create();
        $response = $this->actingAs($user)->put(route('roles.update', 1), ['name' => 'Hexlet', 'permission_id' => 1]);
        $this->assertDatabaseHas('roles', [
            'name' => 'Hexlet'
        ]);
        $response->assertValid();
        $response->assertRedirect(route('roles.index'));
    }

    public function testUpdateRoleNotAdmin(): void
    {
        $permissions = Permission::factory()->create(['id' => 1, 'name' => 'cannot create user']);
        $role = Role::factory()->create(['id' => 1, 'name' => 'hello'])->permissions()->attach([1]);
        $user = User::factory()->create();
        $response = $this->actingAs($user)->put(route('roles.update', 1), ['name' => 'Hexlet', 'permission_id' => 1]);
        $response->assertStatus(403);
    }
}
