<?php

use Azuriom\Models\Permission;
use Azuriom\Models\Role;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Permission::count() > 0) {
            return;
        }

        $defaultPermissions = [
            'comments.create',
        ];

        foreach (Role::all() as $role) {
            $role->syncPermissions($defaultPermissions, false);
        }
    }
}
