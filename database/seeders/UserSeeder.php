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

        //Permission
        Permission::create(['name' => 'index users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'index users teachers']);
        Permission::create(['name' => 'create users teachers']);
        Permission::create(['name' => 'edit users teachers']);
        Permission::create(['name' => 'index users principals']);
        Permission::create(['name' => 'create users principals']);
        Permission::create(['name' => 'edit users principals']);
        Permission::create(['name' => 'destroy all users']);

        Permission::create(['name' => 'index craft books']);
        Permission::create(['name' => 'index review books']);
        Permission::create(['name' => 'index published books']);
        Permission::create(['name' => 'create books']);
        Permission::create(['name' => 'edit books']);
        Permission::create(['name' => 'destroy books']);
        Permission::create(['name' => 'send books to review']);
        Permission::create(['name' => 'publish books']);
        Permission::create(['name' => 'unpublish books']);
        Permission::create(['name' => 'see catalogue books']);

        Permission::create(['name' => 'see book']);
        Permission::create(['name' => 'see units book']);
        Permission::create(['name' => 'see the activities of the units of the books']);
        Permission::create(['name' => 'index units']);
        Permission::create(['name' => 'create units']);
        Permission::create(['name' => 'edit units']);
        Permission::create(['name' => 'destroy units']);
        Permission::create(['name' => 'index activities']);
        Permission::create(['name' => 'create activities']);
        Permission::create(['name' => 'edit activities']);

        Permission::create(['name' => 'destroy activities']);
        Permission::create(['name' => 'index sections']);
        Permission::create(['name' => 'create sections']);
        Permission::create(['name' => 'edit sections']);
        Permission::create(['name' => 'destroy sections']);
        Permission::create(['name' => 'sections preview']);
        Permission::create(['name' => 'see catalogue digital books']);
        Permission::create(['name' => 'see my class rooms']);
        Permission::create(['name' => 'create class rooms']);
        Permission::create(['name' => 'unique']);

        Permission::create(['name' => 'configs']);
        Permission::create(['name' => 'resources']);
        Permission::create(['name' => 'reports']);
        Permission::create(['name' => 'index advisors']);
        Permission::create(['name' => 'see activity apd']);
        Permission::create(['name' => 'apd create visit']);
        Permission::create(['name' => 'apd edit visit']);
        Permission::create(['name' => 'apd delete visit']);
        Permission::create(['name' => 'apd add rate']);
        Permission::create(['name' => 'seller apd see my activity']);

        Permission::create(['name' => 'seller apd create my visit']);
        Permission::create(['name' => 'seller apd edit my visit']);
        Permission::create(['name' => 'seller apd delete my visit']);
        Permission::create(['name' => 'sap sale order']);
        Permission::create(['name' => 'create workshop']);
        Permission::create(['name' => 'edit workshop']);
        Permission::create(['name' => 'delete workshop']);
        Permission::create(['name' => 'see the workshop']);
        Permission::create(['name' => 'register in the workshop']);
        Permission::create(['name' => 'index workshop']);

        Permission::create(['name' => 'sap create sale order']);
        Permission::create(['name' => 'sap edit sale order']);
        Permission::create(['name' => 'sap delete sale order']);
        Permission::create(['name' => 'sap send to sap']);
        Permission::create(['name' => 'see catalogue literary books']);
        Permission::create(['name' => 'index evaluations']);
        Permission::create(['name' => 'create evaluations']);
        Permission::create(['name' => 'edit evaluations']);
        Permission::create(['name' => 'delete evaluations']);
        Permission::create(['name' => 'see evaluation preview']);

        Permission::create(['name' => 'publish evaluation']);
        Permission::create(['name' => 'apply assessment']);
        Permission::create(['name' => 'index resources']);
        Permission::create(['name' => 'create resources']);
        Permission::create(['name' => 'edit resources']);
        Permission::create(['name' => 'delete resources']);

        //Roles
        $role1 = Role::create(['name' => 'admin']);
        $role1->givePermissionTo(Permission::all());

        $role2 = Role::create(['name' => 'supervisor']);
        $role3 = Role::create(['name' => 'curator']);
        $role4 = Role::create(['name' => 'seller']);
        $role5 = Role::create(['name' => 'shoo-principal']);
        $role6 = Role::create(['name' => 'teacher']);
        $role7 = Role::create(['name' => 'student']);
        $role8 = Role::create(['name' => 'super-admin']);

        $role9 = Role::create(['name' => 'admregional']);
        $role9->givePermissionTo(['index craft books', 'index review books', 'index published books']);
        
        $role10 = Role::create(['name' => 'corrector']);
        $role11 = Role::create(['name' => 'cdm']);
        $role12 = Role::create(['name' => 'executive-alpema']);

        //Assignar Roles
        $user = \App\Models\User::factory()->create([
            'email' => 'admin@gmail.com',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'email' => 'adminreg@gmail.com',
        ]);
        $user->assignRole($role9);

    }
}
