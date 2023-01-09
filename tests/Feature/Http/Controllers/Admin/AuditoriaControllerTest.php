<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuditoriaControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function usuario_autenticado_admin_lista_acciones_auditoria()
    {
        //Creo Usuario con rol Admin
        $user = User::factory()->create()->assignRole('Admin');
       //Va a la ruta auditorias
        $response = $this->actingAs($user)->get(route('auditorias.index'));
        //Tiene permisos -> ok
        $response->assertStatus(200);
    }

    public function usuario_autenticado_no_admin_no_lista_acciones_auditoria()
    { 
        //Creo Usuario sin rol
        $user = User::factory()->create();
        //Va a la ruta auditorias
        $response = $this->actingAs($user)->get(route('auditorias.index'));
        //No tiene permisos
        $response->assertStatus(403);
    }
}
