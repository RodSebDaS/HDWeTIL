<?php

namespace Tests\Feature\Http\Controllers\Admin;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoleControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function usuario_autenticado_carga_la_vista_roles()
    {

        $this->post(route('login'), [
            'email' => 'rsddasilva@gmail.com',
            'password' => 'password',
        ]);

        $this->post(route('admin.roles.index'))

        ->assertStatus(302);
    }

     /** @test */
     public function usuario_autenticado_nuevo_rol_lista_permisos()
     {
 
         $this->post(route('login'), [
             'email' => 'rsddasilva@gmail.com',
             'password' => 'password',
         ]);
 
         $response = $this->get(route('admin.roles.create'));

         $response->assertStatus(200);
     }

     /** @test */
     public function usuario_autenticado_nuevo_rol_crear_rol()
     {

         $response = $this->post(route('login'), [
             'email' => 'rsddasilva@gmail.com',
             'password' => 'password',
         ]);

        $request = ['name' => 'Prueba', [1, 2, 3]];
        $response = $this->post(route('admin.roles.store'), $request);

       $this->assertDatabaseHas('roles', [
            'name' => 'Prueba'
        ]);

        //$this->assertDatabaseCount('roles', 4);
        //$response->assertStatus(302);
     }

      /** @test */
      public function usuario_autenticado_eliminar_rol()
      {
       
        $response = $this->post(route('login'), [         //login
              'email' => 'rsddasilva@gmail.com',
              'password' => 'password',
        ]);

        $request = ['name' => 'Prueba', 1, 2, 3];                     //Creo Rol
        $response = $this->post(route('admin.roles.store'), $request);
        $this->assertDatabaseHas('roles',[                            //Compruebo en la BD que se creó el Rol
            'name' => 'Prueba',
        ]);

        $response = $this->delete(route('admin.roles.destroy', 5));   // Elimino el Rol creado
        $this->assertDatabaseMissing('roles',[                       //Compruebo en la BD que se eliminó el Rol
             'name' => 'Prueba',
         ]);
        $response->assertStatus(302);                                 //Confirmo redirección
      }

    /** @test */
    public function usuario_autenticado_edita_lista_de_roles()
    {
        
        $this->post(route('login'), [
            'email' => 'rsddasilva@gmail.com',
            'password' => 'password',
        ]);

        $this->get(route('admin.roles.edit', 1))

       ->assertStatus(200);
    }

   /** @test */
   public function usuario_autenticado_edita_lista_de_roles_modifica_rol_y_redirecciona()
   {
    
     $response = $this->post(route('login'), [
         'email' => 'rsddasilva@gmail.com',
         'password' => 'password',
     ]);
       
     $response = $this->put(route('admin.roles.update', 1, [1, 2]));
     
     $response->assertStatus(302);
   }
}



 
