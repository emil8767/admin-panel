<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable();
            $table->string('status')->nullable();
            $table->bigInteger('role_id')->nullable();
//            $table->foreign('role_id')->references('id')->on('roles');
        });
        DB::table('roles')->insert([
            'id' => 1000,
            'name' => 'admin',
            'description' => 'admin',
        ]);
        DB::table('permissions')->insert([
            'id' => 1,
            'name' => 'can_create_user',
            'description' => 'can_create_user',
        ]);
        DB::table('permission_roles')->insert([
            'permission_id' => 1,
            'role_id' => 1000,
        ]);

        DB::table('permissions')->insert([
            'id' => 2,
            'name' => 'can_create_role',
            'description' => 'can_create_role',
        ]);
        DB::table('permission_roles')->insert([
            'permission_id' => 2,
            'role_id' => 1000,
        ]);
        DB::table('permissions')->insert([
            'id' => 3,
            'name' => 'can_create_permission',
            'description' => 'can_create_permission',
        ]);
        DB::table('permission_roles')->insert([
            'permission_id' => 3,
            'role_id' => 1000,
        ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.admin',
            'password' => Hash::make('admin'),
            'role_id' => 1000
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
