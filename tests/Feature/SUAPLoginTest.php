<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SUAPLoginTest extends TestCase
{
    /**
     * Testar se a view de login é renderizada.
     */
    public function test_authorization_view(): void
    {
        $response = $this->get('/authorization-view');

        $response->assertOk();

        // A página contém verificação CSRF
        $response->assertSee('_token');
    }
}
