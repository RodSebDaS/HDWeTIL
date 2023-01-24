<?php

namespace Tests\Feature\Http\Controllers\Modulo;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SolicitudControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
  public function usuario_autenticado_nuevo_solicitud()
    {
        $this->post(route('login'), [
            'email' => 'rsddasilva@gmail.com',
            'password' => 'password',
        ]);
        $response = $this->get(route('solicitudes.create'));
        $response->assertStatus(200);
    }

   /** @test */
  public function usuario_no_autenticado_no_carga_la_vista_solicitud_redireccionado_login()
    {
        $response = $this->get(route('solicitudes.index'));
        $response->assertRedirect(route('login'));
        $response->assertStatus(302);
    }

  /** @test */
  public function usuario_autenticado_sin_permisos_no_carga_la_vista_solicitudes()
    {
      //Creo Usuario
        $user = User::factory()->create();
      //Dirijo a activos.index
        $response = $this->actingAs($user)->get(route('solicitudes.index'));
      //No permitido
        $response->assertStatus(403);
    }

  /** @test */
  public function usuario_autenticado_edita_lista_de_solicitudes()
  {
      
      $this->post(route('login'), [
          'email' => 'rsddasilva@gmail.com',
          'password' => 'password',
      ]);

      $this->get(route('solicitudes.edit', 1))

      ->assertStatus(302);
  }

   /** @test */
    public function usuario_autenticado_edita_lista_de_solicitudes_modifica_solicitudes_y_redirecciona()
    {

    $response = $this->post(route('login'), [
        'email' => 'rsddasilva@gmail.com',
        'password' => 'password',
    ]);
        
    $response = $this->put(route('solicitudes.update', 1, 
        [
          'tipo_id' => '1',
          'titulo' => 'Prueba',
          'sla' => '12/12/2022 12:00',
          'descripcion' => 'Prueba',
          'canal_id' =>  '1',
          'servicio_id' => '2',
          'activo_id' => '3',
          'prioridad_id' => '2',
          'estado_id' =>  '1',
          'flujovalor_id' =>  '1',
          'activa' => '1',
          'persona_id' =>  '1',
          'user_id' =>  '1',
          'user_id_update_at' => '1',
          'level' => '1',
          'calificacion' => null ,
          'respuesta' => null,
          'observacion' => 'Prueba',
        ]));

    $response->assertStatus(302);
    }

     /** @test */
    public function usuario_autenticado_store_solicitud_y_redirecciona()
    {
        $response = $this->post(route('login'), [
            'email' => 'rsddasilva@gmail.com',
            'password' => 'password',
        ]);

        //Creo Solicitud
        $request =  [
          'tipo_id' => '1',
          'titulo' => 'Prueba1',
          'sla' => '12/12/2022 12:00',
          'descripcion' => 'Prueba1-Prueba1',
          'canal_id' =>  '1',
          'servicio_id' => '2',
          'activo_id' => '3',
          'prioridad_id' => '2',
          'estado_id' =>  '1',
          'flujovalor_id' =>  '1',
          'activa' => '1',
          'persona_id' =>  '1',
          'user_id' =>  '1',
          'user_id_update_at' => '1',
          'level' => '1',
          'calificacion' => null ,
          'respuesta' => null,
          'observacion' => 'Prueba1',
        ]; 
       $response = $this->post(route('solicitudes.store'), $request);
      //Compruebo en la BD que se creó el Solicitud
      $this->assertDatabaseHas('posts', ['titulo' => 'Prueba1']);
      $response->assertStatus(302);
    }

    /** @test */
    public function usuario_autenticado_sin_permisos_no_show_solicitud()
      {
          //Creo Usuario
           $user = User::factory()->create();
          //Usuario logged va a solicitudes.index
          $response = $this->actingAs($user)->get(route('solicitudes.index'));
          //Usuario se dirige a solicitudes.show
          $response = $this->get(route('solicitudes.show',1));
          //sin permisos
          $response->assertStatus(403);
      }

    /** @test */
    public function usuario_autenticado_con_permisos_show_solicitud()
        {
            //Creo Usuario con rol Admin
             $user = User::factory()->create()->assignRole('Admin');
            //Usuario logged va a solicitudes.index
            $response = $this->actingAs($user)->get(route('solicitudes.index'));
            //Usuario se dirige a solicitudes.show
            $response = $this->get(route('solicitudes.show',1));
            //Tiene permisos -> ok
            $response->assertStatus(302);
        }

      /** @test */
     public function usuario_autenticado_destroy_solicitud_y_redirecciona()
     {
      //login
       $response = $this->post(route('login'), [         
             'email' => 'rsddasilva@gmail.com',
             'password' => 'password',
       ]);

      //Creo Solicitud
           $request =  [
            'id' => '15',
            'tipo_id' => '1',
            'titulo' => 'Prueba2',
            'sla' => '12/12/2022 12:00',
            'descripcion' => 'Prueba2-Prueba2',
            'canal_id' =>  '1',
            'servicio_id' => '2',
            'activo_id' => '3',
            'prioridad_id' => '2',
            'estado_id' =>  '1',
            'flujovalor_id' =>  '1',
            'activa' => '1',
            'persona_id' =>  '1',
            'user_id' =>  '1',
            'user_id_update_at' => '1',
            'level' => '1',
            'calificacion' => null ,
            'respuesta' => null,
            'observacion' => 'Prueba2',
          ];
      //Store Solicitud          
       $response = $this->post(route('solicitudes.store'), $request);
       //Compruebo en la BD que se creó el Solicitud
       $this->assertDatabaseHas('posts', ['titulo' => 'Prueba2']);
      // Elimino el Solicitud creado
       $response = $this->delete(route('solicitudes.destroy', 15));  
      //Compruebo en la BD que se eliminó el Solicitud
       $this->assertDatabaseMissing('posts',['id' => '15',]);
       //Confirmo redirección
       $response->assertStatus(302);                                 
     }
}
