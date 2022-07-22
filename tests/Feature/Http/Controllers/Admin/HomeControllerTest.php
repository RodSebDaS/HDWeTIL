<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    /** @test */
    public function usuario_autenticado_y_redireccion_a_pagina_home()
    {
        $user =  User::factory()->create();

        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => $user->password = 'password'
        ]);

        $this->assertAuthenticatedAs($user);
        $response->assertRedirect(route('admin.home'));
    }
}
