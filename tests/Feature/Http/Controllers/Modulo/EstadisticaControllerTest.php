<?php

namespace Tests\Feature\Http\Controllers\Modulo;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PharIo\Manifest\Url;
use Tests\TestCase;
/*
class EstadisticaControllerTest extends TestCase
{
   use RefreshDatabase;

    public function usuario_autenticado_admin_ve_estadisticas()
    {
        //Creo Usuario con rol Admin
        $user = User::factory()->create()->assignRole('Admin');
       //Va a la ruta estadisticas
        $response = $this->actingAs($user)->get(url('/stats'));
        //Tiene permisos -> ok
        $response->assertStatus(200);
    }

    public function usuario_autenticado_admin_no_ve_estadisticas()
    { 
        //Creo Usuario sin rol
        $user = User::factory()->create();
        //Va a la ruta estadisticas
        $response = $this->actingAs($user)->get(url('/stats'));
        //No tiene permisos
        $response->assertStatus(403);
    }
}
*/