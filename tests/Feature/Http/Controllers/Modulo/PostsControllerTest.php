<?php

namespace Tests\Feature\Http\Controllers\Modulo;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostsControllerTest extends TestCase
{
    use RefreshDatabase;
    
   /** @test */
  public function usuario_no_autenticado_no_carga_la_vista_posts_redireccionado_login()
    {
        $response = $this->get(route('posts.index'));
        $response->assertRedirect(route('login'));
        $response->assertStatus(302);
    }

  /** @test */
  public function usuario_autenticado_sin_permisos_no_carga_la_vista_posts()
    {
      //Creo Usuario
        $user = User::factory()->create();
      //Dirijo a posts.index
        $response = $this->actingAs($user)->get(route('posts.index'));
      //No permitido
        $response->assertStatus(403);
    }

    /** @test */
    public function usuario_autenticado_carga_la_vista_posts_atendidas()
    {
           //Creo Usuario
           $user = User::factory()->create()->assignRole('Admin');
           //Dirijo a posts.pendientes
           $response = $this->actingAs($user)->get(route('posts.atendidas'));
           $response->assertStatus(200);
    }

    /** @test */
    public function usuario_autenticado_carga_la_vista_posts_asignadas()
    {
           //Creo Usuario
           $user = User::factory()->create()->assignRole('Admin');
           //Dirijo a posts.pendientes
           $response = $this->actingAs($user)->get(route('posts.asignadas'));
           $response->assertStatus(200);
    }   

    /** @test */
    public function usuario_autenticado_carga_la_vista_posts_derivadas()
    {
           //Creo Usuario
           $user = User::factory()->create()->assignRole('Admin');
           //Dirijo a posts.pendientes
           $response = $this->actingAs($user)->get(route('posts.derivadas'));
           $response->assertStatus(200);
    }   

    /** @test */
    public function usuario_autenticado_carga_la_vista_posts_pendientes()
    {
        //Creo Usuario
        $user = User::factory()->create()->assignRole('Admin');
        //Dirijo a posts.pendientes
        $response = $this->actingAs($user)->get(route('posts.pendientes'));
        $response->assertStatus(200);
    }

   /** @test */
    public function usuario_autenticado_atiende_modifica_post_y_redirecciona()
    {

    $response = $this->post(route('login'), [
        'email' => 'rsddasilva@gmail.com',
        'password' => 'password',
    ]);
    //Usuario se dirige a solicitudes.index
    $response = $this->get(route('solicitudes.index'));
    //Usuario selecciona un solicitud
    $response = $this->get(route('solicitudes.show',1)); 
    //Atiende la solicitud y la clasifica como incidencia   
    $response = $this->get(route('posts.atender', 1, 
        [
          'tipo_id' => '1',
          'titulo' => 'Prueba',
          'sla' => '12/12/2022 12:00',
          'descripcion' => 'Prueba',
          'canal_id' =>  '1',
          'servicio_id' => '2',
          'activo_id' => '3',
          'prioridad_id' => '2',
          'estado_id' =>  '2',
          'flujovalor_id' =>  '2',
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
       public function usuario_autenticado_deriva_modifica_post_y_redirecciona()
       {
   
       $response = $this->post(route('login'), [
           'email' => 'rsddasilva@gmail.com',
           'password' => 'password',
       ]);
      
       $response = $this->get(route('posts.derivar', 1, 
           [
             'tipo_id' => '1',
             'titulo' => 'Prueba',
             'sla' => '12/12/2022 12:00',
             'descripcion' => 'Prueba',
             'canal_id' =>  '1',
             'servicio_id' => '2',
             'activo_id' => '3',
             'prioridad_id' => '2',
             'estado_id' =>  '3',
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
    public function usuario_autenticado_cierra_modifica_post_y_redirecciona()
       {
   
       $response = $this->post(route('login'), [
           'email' => 'rsddasilva@gmail.com',
           'password' => 'password',
       ]);
           
       $response = $this->get(route('posts.cerrar', 1, 
           [
             'tipo_id' => '1',
             'titulo' => 'Prueba',
             'sla' => '12/12/2022 12:00',
             'descripcion' => 'Prueba',
             'canal_id' =>  '1',
             'servicio_id' => '2',
             'activo_id' => '3',
             'prioridad_id' => '2',
             'estado_id' =>  '4',
             'flujovalor_id' =>  '4',
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
    public function usuario_autenticado_rechaza_modifica_post_y_redirecciona()
    {

    $response = $this->post(route('login'), [
        'email' => 'rsddasilva@gmail.com',
        'password' => 'password',
    ]);
        
    $response = $this->get(route('posts.rechazar', 1, 
        [
          'tipo_id' => '1',
          'titulo' => 'Prueba',
          'sla' => '12/12/2022 12:00',
          'descripcion' => 'Prueba',
          'canal_id' =>  '1',
          'servicio_id' => '2',
          'activo_id' => '3',
          'prioridad_id' => '2',
          'estado_id' =>  '6',
          'flujovalor_id' =>  '6',
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
    public function usuario_autenticado_selecciona_post_cierra_y_se_muestra_en_lista_de_preguntas_frecuentes()
       {
      //Usuario login
       $response = $this->post(route('login'), [
           'email' => 'rsddasilva@gmail.com',
           'password' => 'password',
       ]);
      //Usuario se dirige a posts.index
       $response = $this->get(route('posts.index'));
       //Usuario selecciona un post
       $response = $this->get(route('posts.show',1));
      //Cierra Post    
      $response = $this->get(route('posts.cerrar', 1, 
      [
        'tipo_id' => '1',
        'titulo' => 'Prueba',
        'sla' => '12/12/2022 12:00',
        'descripcion' => 'Prueba',
        'canal_id' =>  '1',
        'servicio_id' => '2',
        'activo_id' => '3',
        'prioridad_id' => '2',
        'estado_id' =>  '4',
        'flujovalor_id' =>  '4',
        'activa' => '1',
        'persona_id' =>  '1',
        'user_id' =>  '1',
        'user_id_update_at' => '1',
        'level' => '1',
        'calificacion' => null ,
        'respuesta' => null,
        'observacion' => 'Prueba',
      ]));
        //Redirige envia email y lista
        $response->assertStatus(302);
       }
}
