<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    /** @test */
    public function usuario_autenticado_redirecciona_a_pagina_home()
    {
        $user =  User::factory()->create();

        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => $user->password = 'password'
        ]);

        $this->assertAuthenticatedAs($user);
        $response->assertRedirect(route('admin.home'));
        $response->assertStatus(302);
    }

     /** @test */
     public function usuario_no_autenticado_no_redirecciona_a_pagina_home_sino_a_login()
     {
         $user = User::factory()->create();
         $this->get(route('admin.home'))
         ->assertRedirect(route('login'))
         ->assertStatus(302);
     }

    /** @test */
    public function usuario_autenticado_redirecciona_a_pagina_dashboard()
    {
        $user = User::find(2);
        $response = $this->actingAs($user)->get(route('admin.dashboard'));
        $response->assertStatus(200);
    }

    /** @test */
     public function usuario_no_autenticado_no_redirecciona_a_pagina_dashboard_sino_a_login()
     {
         $user = User::factory()->create();
         $this->get(route('admin.dashboard'))
         ->assertRedirect(route('login'))
         ->assertStatus(302);
     }
}
