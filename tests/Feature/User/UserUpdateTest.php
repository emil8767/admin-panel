<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Permission;
use App\Models\User;
use App\Models\Role;

class UserUpdateTest extends TestCase
{
    use RefreshDatabase;

    public function testUpdateUserAdminValid(): void
    {
        $permissions = Permission::factory()->create(['id' => 1, 'name' => 'can create user']);
        $role = Role::factory()->create(['id' => 1, 'name' => 'hello'])->permissions()->attach([1]);
        $user = User::factory()->create();
        $response = $this->actingAs($user)->put(route('users.update', 1), ['name' => 'Novosib',
        'email' => 'emil11@mail.ru', 'password' => 'emil1111', 'status' => 'active', 'role_id' => 1]);
        $this->assertDatabaseHas('users', [
            'name' => 'Novosib'
        ]);
        $response->assertValid();
        $response->assertRedirect(route('users.index'));
    }

    public function testUpdateUserNotAdmin(): void
    {
        $permissions = Permission::factory()->create(['id' => 1, 'name' => 'cannot create user']);
        $role = Role::factory()->create(['id' => 1, 'name' => 'hello'])->permissions()->attach([1]);
        $user = User::factory()->create();
        $response = $this->actingAs($user)->put(route('users.update', 1), ['name' => 'Hexlet']);
        $response->assertStatus(403);
    }
}
