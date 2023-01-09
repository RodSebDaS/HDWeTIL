<?php

namespace Tests\Feature\Http\Controllers\Modulo;

use App\Models\Activo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ActivoControllerTest extends TestCase
{
    use RefreshDatabase;

      /** @test */
    public function usuario_autenticado_nuevo_activo()
      {
          $this->post(route('login'), [
              'email' => 'rsddasilva@gmail.com',
              'password' => 'password',
          ]);
          $response = $this->get(route('activos.create'));
          $response->assertStatus(200);
      }

     /** @test */
    public function usuario_no_autenticado_no_carga_la_vista_activos_redireccionado_login()
      {
          $response = $this->get(route('activos.index'));
          $response->assertRedirect(route('login'));
          $response->assertStatus(302);
      }

    /** @test */
    public function usuario_autenticado_sin_permisos_no_carga_la_vista_activos()
      {
        //Creo Usuario
          $user = User::factory()->create();
        //Dirijo a activos.index
          $response = $this->actingAs($user)->get(route('activos.index'));
        //No permitido
          $response->assertStatus(403);
      }

    /** @test */
    public function usuario_autenticado_edita_lista_de_activos()
    {
        
        $this->post(route('login'), [
            'email' => 'rsddasilva@gmail.com',
            'password' => 'password',
        ]);

        $this->get(route('activos.edit', 1))

       ->assertStatus(200);
    }

    /** @test */
    public function usuario_autenticado_edita_lista_de_activos_modifica_activo_y_redirecciona()
    {

    $response = $this->post(route('login'), [
        'email' => 'rsddasilva@gmail.com',
        'password' => 'password',
    ]);
        
    $response = $this->put(route('activos.update', 1, 
        [
            'nombre' => 'Prueba',
            'descripcion' => 'Prueba',
            'fecha_adquisicion' => '12/12/2022',
            'valor' => '5000',
            'stock' => '5',
            'categoria_id' => '1',
            'marca_id' => '1',
            'modelo_id' => '1',
            'estado_id' => '1',
            'area_id' => '1',
            'cod_prosupuesto' => '435',
            'categoria_nombre' => '1',
            'vida_util' => '3',
            'amortizacion' => '33',
        ]));
    $response->assertStatus(302);
    }

      /** @test */
      public function usuario_autenticado_store_activo_y_redirecciona()
      {
          $response = $this->post(route('login'), [
              'email' => 'rsddasilva@gmail.com',
              'password' => 'password',
          ]);

          //Creo Activo
          $request =  [
              'nombre' => 'Prueba1',
              'descripcion' => 'Prueba1',
              'fecha_adquisicion' => '12/12/2022',
              'valor' => '5000',
              'stock' => '5',
              'categoria_id' => '1',
              'marca_id' => '1',
              'modelo_id' => '1',
              'estado_id' => '1',
              'area_id' => '1',
              'cod_prosupuesto' => '435',
              'categoria_nombre' => '1',
              'vida_util' => '3',
              'amortizacion' => '33',
          ]; 
         $response = $this->post(route('activos.store'), $request);
        //Compruebo en la BD que se creó el Activo
        $this->assertDatabaseHas('activos', ['nombre' => 'Prueba1']);
        $response->assertStatus(302);
      }

        /** @test */
        public function usuario_autenticado_sin_permisos_no_show_activo()
        {
            //Creo Usuario
             $user = User::factory()->create();
            //Usuario logged va a activos.index
            $response = $this->actingAs($user)->get(route('activos.index'));
            //Usuario se dirige a activos.show
            $response = $this->get(route('activos.show',1));
            //sin permisos
            $response->assertStatus(403);
        }

          /** @test */
          public function usuario_autenticado_con_permisos_show_activo()
          {
              //Creo Usuario con rol Admin
               $user = User::factory()->create()->assignRole('Admin');
              //Usuario logged va a activos.index
              $response = $this->actingAs($user)->get(route('activos.index'));
              //Usuario se dirige a activos.show
              $response = $this->get(route('activos.show',1));
              //Tiene permisos -> ok
              $response->assertStatus(200);
          }

       /** @test */
       public function usuario_autenticado_destroy_activo_y_redirecciona()
       {
        //login
         $response = $this->post(route('login'), [         
               'email' => 'rsddasilva@gmail.com',
               'password' => 'password',
         ]);
 
        //Creo Activo
             $request =  [
                'id' => 15,
                'nombre' => 'Prueba2',
                'descripcion' => 'Prueba2',
                'fecha_adquisicion' => '12/12/2022',
                'valor' => '5000',
                'stock' => '5',
                'categoria_id' => '1',
                'marca_id' => '1',
                'modelo_id' => '1',
                'estado_id' => '1',
                'area_id' => '1',
                'cod_prosupuesto' => '435',
                'categoria_nombre' => '1',
                'vida_util' => '3',
                'amortizacion' => '33',
            ];
        //Store Activo          
         $response = $this->post(route('activos.store'), $request);
         //Compruebo en la BD que se creó el Activo
         $this->assertDatabaseHas('activos', ['nombre' => 'Prueba2']);
        // Elimino el Activo creado
         $response = $this->delete(route('activos.destroy', 15));  
        //Compruebo en la BD que se eliminó el Activo
         $this->assertDatabaseMissing('activos',['nombre' => 'Prueba2',]);
         //Confirmo redirección
         $response->assertStatus(302);                                 
       }
}
