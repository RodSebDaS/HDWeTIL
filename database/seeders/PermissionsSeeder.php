<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list causas']);
        Permission::create(['name' => 'view causas']);
        Permission::create(['name' => 'create causas']);
        Permission::create(['name' => 'update causas']);
        Permission::create(['name' => 'delete causas']);

        Permission::create(['name' => 'list incidencias']);
        Permission::create(['name' => 'view incidencias']);
        Permission::create(['name' => 'create incidencias']);
        Permission::create(['name' => 'update incidencias']);
        Permission::create(['name' => 'delete incidencias']);

        Permission::create(['name' => 'list personas']);
        Permission::create(['name' => 'view personas']);
        Permission::create(['name' => 'create personas']);
        Permission::create(['name' => 'update personas']);
        Permission::create(['name' => 'delete personas']);

        Permission::create(['name' => 'list procesos']);
        Permission::create(['name' => 'view procesos']);
        Permission::create(['name' => 'create procesos']);
        Permission::create(['name' => 'update procesos']);
        Permission::create(['name' => 'delete procesos']);

        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo($currentPermissions);

        // Create admin exclusive permissions
        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        $user = \App\Models\User::whereEmail('admin@admin.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
