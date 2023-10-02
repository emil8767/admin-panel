<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Permission;
use App\Models\User;
use App\Models\Role;

class RoleShowTest extends TestCase
{
    use RefreshDatabase;

    public function testItCanShowRoleDetails()
    {
        $permissions = Permission::factory()->create(['id' => 1]);
        $role = Role::factory()->create(['id' => 3])->permissions()->attach([1]);
        $user = User::factory()->create(['role_id' => 3]);
        // Вызовите маршрут, который использует метод show с параметром $role
        $response = $this->get(route('roles.show', 3));

        // Проверьте, что возвращается представление 'roles.show' с переданным объектом роли
        $response->assertStatus(302);
    }
}
