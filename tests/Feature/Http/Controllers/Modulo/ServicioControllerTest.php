<?php

namespace Tests\Feature\Http\Controllers\Modulo;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServicioControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
  public function usuario_autenticado_nuevo_servicio()
    {
        $this->post(route('login'), [
            'email' => 'rsddasilva@gmail.com',
            'password' => 'password',
        ]);
        $response = $this->get(route('servicios.create'));
        $response->assertStatus(200);
    }

   /** @test */
  public function usuario_no_autenticado_no_carga_la_vista_servicios_redireccionado_login()
    {
        $response = $this->get(route('servicios.index'));
        $response->assertRedirect(route('login'));
        $response->assertStatus(302);
    }

  /** @test */
  public function usuario_autenticado_sin_permisos_no_carga_la_vista_servicios()
    {
      //Creo Usuario
        $user = User::factory()->create();
      //Dirijo a activos.index
        $response = $this->actingAs($user)->get(route('servicios.index'));
      //No permitido
        $response->assertStatus(403);
    }

  /** @test */
  public function usuario_autenticado_edita_lista_de_servicios()
  {
      
      $this->post(route('login'), [
          'email' => 'rsddasilva@gmail.com',
          'password' => 'password',
      ]);

      $this->get(route('servicios.edit', 1))

     ->assertStatus(200);
  }

   /** @test */
    public function usuario_autenticado_edita_lista_de_servicios_modifica_servicio_y_redirecciona()
    {

    $response = $this->post(route('login'), [
        'email' => 'rsddasilva@gmail.com',
        'password' => 'password',
    ]);
        
    $response = $this->put(route('servicios.update', 1, 
        [
            'nombre' => 'Prueba',
            'descripcion' => 'Prueba',
            'estado_id' => 14,
            'valor' => 15000,
        ]));
    $response->assertStatus(302);
    }

    /** @test */
    public function usuario_autenticado_store_servicio_y_redirecciona()
    {
        $response = $this->post(route('login'), [
            'email' => 'rsddasilva@gmail.com',
            'password' => 'password',
        ]);

        //Creo Servicio
        $request =  [
            'nombre' => 'Prueba1',
            'descripcion' => 'Prueba1',
            'estado_id' => 14,
            'valor' => 15000,
        ]; 
       $response = $this->post(route('servicios.store'), $request);
      //Compruebo en la BD que se creó el Servicio
      $this->assertDatabaseHas('servicios', ['nombre' => 'Prueba1']);
      $response->assertStatus(302);
    }

      /** @test */
      public function usuario_autenticado_sin_permisos_no_show_servicio()
      {
          //Creo Usuario
           $user = User::factory()->create();
          //Usuario logged va a servicios.index
          $response = $this->actingAs($user)->get(route('servicios.index'));
          //Usuario se dirige a servicios.show
          $response = $this->get(route('servicios.show',1));
          //sin permisos
          $response->assertStatus(403);
      }

        /** @test */
        public function usuario_autenticado_con_permisos_show_servicio()
        {
            //Creo Usuario con rol Admin
             $user = User::factory()->create()->assignRole('Admin');
            //Usuario logged va a servicios.index
            $response = $this->actingAs($user)->get(route('servicios.index'));
            //Usuario se dirige a servicios.show
            $response = $this->get(route('servicios.show',1));
            //Tiene permisos -> ok
            $response->assertStatus(200);
        }

     /** @test */
     public function usuario_autenticado_destroy_servicio_y_redirecciona()
     {
      //login
       $response = $this->post(route('login'), [         
             'email' => 'rsddasilva@gmail.com',
             'password' => 'password',
       ]);

      //Creo Servicio
           $request =  [
            'id' => 15,
            'nombre' => 'Prueba2',
            'descripcion' => 'Prueba2',
            'estado_id' => 14,
            'valor' => 15000,
          ];
      //Store Servicio          
       $response = $this->post(route('servicios.store'), $request);
       //Compruebo en la BD que se creó el Servicio
       $this->assertDatabaseHas('servicios', ['nombre' => 'Prueba2']);
      // Elimino el Servicio creado
       $response = $this->delete(route('servicios.destroy', 15));  
      //Compruebo en la BD que se eliminó el Servicio
       $this->assertDatabaseMissing('servicios',['nombre' => 'Prueba2',]);
       //Confirmo redirección
       $response->assertStatus(302);                                 
     }
}
