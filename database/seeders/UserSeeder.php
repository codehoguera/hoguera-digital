<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'publish articles']);
        Permission::create(['name' => 'unpublish articles']);

        $role1 = Role::create(['name' => 'admin']);
        $role1->givePermissionTo('edit articles');
        $role1->givePermissionTo('delete articles');

        $role2 = Role::create(['name' => 'super-admin']);

        $user = User::factory()->create([
            'email' => 'admin@gmail.com',
        ]);
        $user->assignRole($role1);

        $user = User::factory()->create([
            'email' => 'superadmin@gmail.com',
        ]);
        $user->assignRole($role2);

        User::factory(10)->create();

    }
}
