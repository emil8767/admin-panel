<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Permission;
use App\Models\User;
use App\Models\Role;

class RoleEditTest extends TestCase
{
    use RefreshDatabase;

    public function testItCanShowTheEditFormForRole()
    {
        $permissions = Permission::factory()->create(['id' => 1]);
        $role = Role::factory()->create()->permissions()->attach([1]);
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('roles.edit', 1));
        $response->assertStatus(200);
        $response->assertViewIs('roles.edit');
    }

    public function testItCannotShowTheEditFormForRole()
    {
        $permissions = Permission::factory()->create(['id' => 1, 'name' => 'cannot create']);
        $role = Role::factory()->create()->permissions()->attach([1]);
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('roles.edit', 1));
        $response->assertStatus(403);
    }
}
