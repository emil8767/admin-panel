<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Permission;
use App\Models\User;
use App\Models\Role;

class UserIndexTest extends TestCase
{
    use RefreshDatabase;

    public function testIndexMethodReturnsViewWithUsers()
    {
        $permissions = Permission::factory()->create(['id' => 1]);
        $role = Role::factory()->create()->permissions()->attach([1]);
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/users');
        $response->assertSee('Create user');
        $response->assertStatus(200);
    }

    public function testIndexMethodReturnsErrorIfNotAuth()
    {
        $response = $this->get('/users');
        $response->assertStatus(302);
    }

    public function testIndexMethodUserCannotCreate()
    {
        $permissions = Permission::factory()->create(['id' => '1', 'name' => 'cannot create']);
        $role = Role::factory()->create()->permissions()->attach([1]);
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/users');
        $response->assertDontSeeText('Create users');
        $response->assertDontSeeText('update');
        $response->assertStatus(200);
    }
}
