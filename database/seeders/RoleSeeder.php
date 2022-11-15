<?php

namespace Database\Seeders;

use App\Models\level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         // Módulo Roles

        $role1 = Role::create(['guard_name' => 'web', 'name' => 'Admin', 'level' => null]);
        $role2 = Role::create(['guard_name' => 'web', 'name' => 'Alumno', 'level' => null]);
        $role3 = Role::create(['guard_name' => 'web', 'name' => 'Especialista', 'level' => '3' ]);
        $role4 = Role::create(['guard_name' => 'web', 'name' => 'Mesa de Ayuda', 'level' => '1' ]);
        //$role5 = Role::create(['guard_name' => 'web', 'name' => 'Socio-Proveedor', 'level' => '4' ]);
        $role5 = Role::create(['guard_name' => 'web', 'name' => 'Soporte Técnico', 'level' => '2']);

        // Módulo Usuarios
      
        // Admin - Usuarios
        $permission = Permission::create(['guard_name' => 'web', 'name' => 'admin.home', 'description' => 'Ver Tablero'])->syncRoles($role1,$role2,$role3,$role4,$role5);
        $permission = Permission::create(['guard_name' => 'web', 'name' => 'admin.users.index','description' => 'Ver lista de Usuarios'])->syncRoles($role1);
        //$permission = Permission::create(['name' => 'admin.users.create','description' => 'Crear Usuario'])->syncRoles($role1);
        $permission = Permission::create(['name' => 'admin.users.edit','description' => 'Asignar Rol'])->syncRoles($role1);
        $permission = Permission::create(['name' => 'admin.users.update','description' => 'Actualizar Usuario'])->syncRoles($role1);
        $permission = Permission::create(['name' => 'admin.users.destroy','description' => 'Eliminar Usuario'])->syncRoles($role1);
        $permission = Permission::create(['name' => 'datatable.users','description' => 'Tabla Uuarios'])->syncRoles($role1);
        // Admin - Roles
        $permission = Permission::create(['name' => 'admin.roles.index','description' => 'Ver lista de Roles'])->syncRoles($role1);
        $permission = Permission::create(['name' => 'admin.roles.create','description' => 'Crear Rol'])->syncRoles($role1);
        $permission = Permission::create(['name' => 'admin.roles.store','description' => 'Guardar Rol'])->syncRoles($role1);
        //$permission = Permission::create(['name' => 'admin.roles.show','description' => 'Mostrar Rol'])->syncRoles($role1);
        $permission = Permission::create(['name' => 'admin.roles.edit','description' => 'Editar Rol'])->syncRoles($role1);
        //$permission = Permission::create(['name' => 'admin.roles.update','description' => 'Actualizar Rol'])->syncRoles($role1);
        $permission = Permission::create(['name' => 'admin.roles.destroy','description' => 'Eliminar Rol'])->syncRoles($role1);
        // Solicitudes
        $permission = Permission::create(['name' => 'solicitudes.index','description' => 'Ver lista de Solicitudes'])->syncRoles($role1,$role2,$role3,$role4,$role5);
        $permission = Permission::create(['name' => 'solicitudes.create','description' => 'Crear Solicitud'])->syncRoles($role1,$role2,$role3,$role4,$role5);
        $permission = Permission::create(['name' => 'solicitudes.store','description' => 'Guardar Solicitud'])->syncRoles($role1,$role2,$role3,$role4,$role5);
        $permission = Permission::create(['name' => 'solicitudes.show','description' => 'Mostrar Solicitud'])->syncRoles($role1,$role3,$role4,$role5);
        $permission = Permission::create(['name' => 'solicitudes.edit','description' => 'Editar Solicitud'])->syncRoles($role1,$role2,$role3,$role4,$role5);
        $permission = Permission::create(['name' => 'solicitudes.update','description' => 'Actualizar Solicitud'])->syncRoles($role1,$role2,$role3,$role4,$role5);
        $permission = Permission::create(['name' => 'solicitudes.destroy','description' => 'Eliminar Solicitud'])->syncRoles($role1);
        $permission = Permission::create(['name' => 'datatable.solicitudes','description' => 'Tabla Solicitudes'])->syncRoles($role1,$role2,$role3,$role4,$role5);
        // Posts
        //$permission = Permission::create(['name' => 'posts.index','description' => 'Ver listas'])->syncRoles($role1,$role3,$role4,$role5);
        //$permission = Permission::create(['name' => 'posts.create','description' => 'Crear Incidencia'])->syncRoles($role1);
        //$permission = Permission::create(['name' => 'posts.store','description' => 'Guardar Incidencia'])->syncRoles($role1,$role3,$role4,$role5);
        //$permission = Permission::create(['name' => 'posts.show','description' => 'Mostrar Incidencia'])->syncRoles($role1,$role3);
        //$permission = Permission::create(['name' => 'posts.edit','description' => 'Editar Incidencia'])->syncRoles($role1,$role3,$role4,$role5);
        //$permission = Permission::create(['name' => 'posts.update','description' => 'Actualizar Incidencia'])->syncRoles($role1,$role3,$role4,$role5);
        //$permission = Permission::create(['name' => 'posts.destroy','description' => 'Eliminar Incidencia'])->syncRoles($role1);
        //Post - Acciones
        $permission = Permission::create(['name' => 'posts.atendidas','description' => 'Ver lista de Atendidos'])->syncRoles($role1,$role3,$role4,$role5);
        $permission = Permission::create(['name' => 'posts.asignadas','description' => 'Ver listas de Asignados'])->syncRoles($role1,$role3,$role4,$role5);
        $permission = Permission::create(['name' => 'posts.derivadas','description' => 'Ver listas de Derivados'])->syncRoles($role1,$role3,$role4,$role5);
        $permission = Permission::create(['name' => 'posts.atender','description' => 'Atender'])->syncRoles($role1,$role3,$role4,$role5);
        $permission = Permission::create(['name' => 'posts.derivar','description' => 'Derivar'])->syncRoles($role1,$role3,$role4,$role5);
        $permission = Permission::create(['name' => 'posts.cerrar','description' => 'Cerrar Solicitud'])->syncRoles($role1,$role2,$role3,$role4,$role5);
        $permission = Permission::create(['name' => 'posts.rechazar','description' => 'Rechazar Solicitud'])->syncRoles($role1,$role3,$role4,$role5);
        $permission = Permission::create(['name' => 'posts.edit','description' => 'Editar Post'])->syncRoles($role1,$role3,$role4,$role5);
        $permission = Permission::create(['name' => 'posts.update','description' => 'Actualizar Post'])->syncRoles($role1,$role3,$role4,$role5);
        $permission = Permission::create(['name' => 'posts.show','description' => 'Mostrar Post'])->syncRoles($role1,$role3,$role4,$role5);
        $permission = Permission::create(['name' => 'posts.destroy','description' => 'Eliminar Post'])->syncRoles($role1);
        $permission = Permission::create(['name' => 'datatable.posts','description' => 'Ver Tablas'])->syncRoles($role1,$role3,$role4,$role5);
        //Compontes
        //Historial
        $permission = Permission::create(['name' => 'posts.historial','description' => 'Historial de Actividades'])->syncRoles($role1,$role2,$role3,$role4,$role5);
        //Stepper
        //$permission = Permission::create(['name' => 'stepper.posts','description' => ''])->syncRoles($role1,$role3,$role4,$role5);
            //Comentarios
        $permission = Permission::create(['name' => 'comentarios.index','description' => 'Comentar'])->syncRoles($role1,$role2,$role3,$role4,$role5);
        $permission = Permission::create(['name' => 'comentarios.store','description' => 'Comentar'])->syncRoles($role1,$role2,$role3,$role4,$role5);
        $permission = Permission::create(['name' => 'comentarios.edit','description' => 'Editar Comentario'])->syncRoles($role1);
        $permission = Permission::create(['name' => 'comentarios.update','description' => 'Actualizar Comentario'])->syncRoles($role1);
        $permission = Permission::create(['name' => 'comentarios.destroy','description' => 'Eliminar Comentario'])->syncRoles($role1);  
    }
}
