<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'User']);
        
        $permission = Permission::create(['name' => 'admin.home', 'description' => 'Ver Tablero'])->syncRoles($role1, $role2);

    // Módulo Usuarios
    
        $permission = Permission::create(['name' => 'admin.users.index','description' => 'Ver lista de Usuarios'])->syncRoles($role1);
        //$permission = Permission::create(['name' => 'admin.users.create','description' => 'Crear Usuario'])->syncRoles($role1);
        $permission = Permission::create(['name' => 'admin.users.edit','description' => 'Asignar Rol'])->syncRoles($role1);
        //$permission = Permission::create(['name' => 'admin.users.update','description' => ''])->syncRoles($role1);
        $permission = Permission::create(['name' => 'admin.users.destroy','description' => 'Eliminar Usuario'])->syncRoles($role1);
    
    }
}
