<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\User;
use Database\Seeders\UserSeeder;
use GuzzleHttp\Promise\Create;
use GuzzleHttp\Psr7\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Auth\AuthenticationException;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Seeder;
use Spatie\Permission\Traits\HasPermissions;


use App\Http\Controllers\Controller;
use Illuminate\Auth\GenericUser;
use Illuminate\Foundation\Testing\WithoutEvents;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function usuario_no_autenticado_index_no_carga_la_vista_usuarios()
    {

        $user = User::factory()->create();
       

        $response = $this->actingAs($user)->get(route('admin.users.index'));
    
        $response->assertStatus(403);
    }

    /** @test */
    public function usuario_no_autenticado_no_puede_editar_lista_usuarios()
    {
        $user = User::factory()->create();
    
        $response = $this->actingAs($user)->get(route('admin.users.edit', $user));
    
        $response->assertStatus(403);
        
    }

    /** @test */
    public function usuario_autenticado_carga_la_vista_usuarios()
    {
       $this->post(route('login'), [
            'email' => 'rsddasilva@gmail.com',
            'password' => 'password',
       ]);
        
        $this->assertAuthenticated();

        $response = $this->get(route('admin.users.index'));

        $response->assertStatus(200);
    }

    /** @test */
    public function usuario_autenticado_edita_lista_de_usuarios()
    {
       
        $this->post(route('login'), [
            'email' => 'rsddasilva@gmail.com',
            'password' => 'password',
        ]);

        $response = $this->get(route('admin.users.edit', 1));

        $response->assertStatus(200);
    }

      /** @test */
      public function usuario_autenticado_edita_lista_de_usuarios_asigna_rol_y_redirecciona()
      {
       
        $response = $this->post(route('login'), [
            'email' => 'rsddasilva@gmail.com',
            'password' => 'password',
        ]);
          
        $response = $this->put(route('admin.users.update', 1, [1, 2]));

        $response->assertStatus(302);
      }
}
