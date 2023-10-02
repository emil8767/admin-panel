<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Permission;
use App\Models\User;
use App\Models\Role;

class UserStoreTest extends TestCase
{
    use RefreshDatabase;

    public function testStoreAdmin(): void
    {
        $permissions = Permission::factory()->create(['id' => 1]);
        $role = Role::factory()->create()->permissions()->attach([1]);
        $user = User::factory()->create(['id' => 3]);
        $response = $this->actingAs($user)->post(route('users.store'), ['name' => 'Novosib',
        'email' => 'emil11@mail.ru', 'password' => 'emil1111', 'status' => 'active', 'role_id' => 1]);
        $response->assertRedirect('/users');
    }

    public function testStoreNotAdmin(): void
    {
        $permissions = Permission::factory()->create(['id' => 1, 'name' => 'cannot']);
        $role = Role::factory()->create()->permissions()->attach([1]);
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post(route('users.store'), ['name' => 'Novosib']);
        $response->assertStatus(403);
    }
}
