<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Permission;
use App\Models\User;
use App\Models\Role;

class UserEditTest extends TestCase
{
   use RefreshDatabase;

   public function testItCanShowTheEditFormForUser() 
    {
    $permissions = Permission::factory()->create(['id' => 1]);
    $role = Role::factory()->create()->permissions()->attach([1]);;
    $user = User::factory()->create();
    $response = $this->actingAs($user)->get(route('users.edit', 1));
    $response->assertStatus(200);
    $response->assertViewIs('users.edit');
    }

    public function testItCannotShowTheEditFormForUser() 
    {
    $permissions = Permission::factory()->create(['id' => 1, 'name' => 'cannot create']);
    $role = Role::factory()->create()->permissions()->attach([1]);;
    $user = User::factory()->create();
    $response = $this->actingAs($user)->get(route('users.edit', 1));
    $response->assertStatus(403);
    }
}
