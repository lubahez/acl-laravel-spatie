<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$default_permissions = array(
    		array('name' => 'create_users', 'guard_name' => 'web'),
    		array('name' => 'read_users', 'guard_name' => 'web'),
    		array('name' => 'update_users', 'guard_name' => 'web'),
    		array('name' => 'deactivate_users', 'guard_name' => 'web'),

    		array('name' => 'create_roles', 'guard_name' => 'web'),
    		array('name' => 'read_roles', 'guard_name' => 'web'),
    		array('name' => 'update_roles', 'guard_name' => 'web'),
    		array('name' => 'deactivate_roles', 'guard_name' => 'web'),

    		array('name' => 'create_permissions', 'guard_name' => 'web'),
    		array('name' => 'read_permissions', 'guard_name' => 'web'),
    		array('name' => 'update_permissions', 'guard_name' => 'web'),
    		array('name' => 'deactivate_permissions', 'guard_name' => 'web'),
    	);

        DB::table('permissions')->insert($default_permissions);
    }
}
