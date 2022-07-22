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
        $role1 = Role::create(['guard_name' => 'web', 'name' => 'Admin']);
        $role2 = Role::create(['guard_name' => 'web', 'name' => 'Empleado']);
        $role3 = Role::create(['guard_name' => 'web', 'name' => 'Alumno']);
        
    // Módulo Usuarios
    
        // Admin - Usuarios
        $permission = Permission::create(['guard_name' => 'web', 'name' => 'admin.home', 'description' => 'Ver Tablero'])->syncRoles($role1,$role2,$role3);
        $permission = Permission::create(['guard_name' => 'web', 'name' => 'admin.users.index','description' => 'Ver lista de Usuarios'])->syncRoles($role1);
        //$permission = Permission::create(['name' => 'admin.users.create','description' => 'Crear Usuario'])->syncRoles($role1);
        $permission = Permission::create(['name' => 'admin.users.edit','description' => 'Asignar Rol'])->syncRoles($role1);
        //$permission = Permission::create(['name' => 'admin.users.update','description' => ''])->syncRoles($role1);
        $permission = Permission::create(['name' => 'admin.users.destroy','description' => 'Eliminar Usuario'])->syncRoles($role1);
        // Admin - Roles
        $permission = Permission::create(['name' => 'admin.roles.index','description' => 'Ver lista de Roles'])->syncRoles($role1);
        $permission = Permission::create(['name' => 'admin.roles.create','description' => 'Crear Rol'])->syncRoles($role1);
        $permission = Permission::create(['name' => 'admin.roles.store','description' => 'Guardar Rol'])->syncRoles($role1);
        //$permission = Permission::create(['name' => 'admin.roles.show','description' => 'Mostrar Rol'])->syncRoles($role1);
        $permission = Permission::create(['name' => 'admin.roles.edit','description' => 'Editar Rol'])->syncRoles($role1);
        //$permission = Permission::create(['name' => 'admin.roles.update','description' => 'Actualizar Rol'])->syncRoles($role1);
        $permission = Permission::create(['name' => 'admin.roles.destroy','description' => 'Eliminar Rol'])->syncRoles($role1);
    }
}
