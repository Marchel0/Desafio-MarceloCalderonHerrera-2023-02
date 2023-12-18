<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(["name"=> "Admin"]);
        $role2 = Role::create(["name"=> "Usuario"]);
        $user = User::finde(1);
        $user->assignRole($role1);
    }
}
