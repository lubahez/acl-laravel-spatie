<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        Permission::create(['name' => 'create_users']);
        Permission::create(['name' => 'read_users']);
        Permission::create(['name' => 'update_users']);
        Permission::create(['name' => 'deactivate_users']);

        Permission::create(['name' => 'create_roles']);
        Permission::create(['name' => 'read_roles']);
        Permission::create(['name' => 'update_roles']);
        Permission::create(['name' => 'deactivate_roles']);

        Permission::create(['name' => 'create_permissions']);
        Permission::create(['name' => 'read_permissions']);
        Permission::create(['name' => 'update_permissions']);
        Permission::create(['name' => 'deactivate_permissions']);

        // create roles and assign created permissions
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());
    }
}
