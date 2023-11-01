<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\TestCase;

#[CoversClass('\App\Http\Controllers\ItemController')]
class ItemControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('db:seed --class=SessionSeeder');
    }

    /**
     * Testa se exibe a página de devolução de itens.
     */
    public function test_ItemController_devolver(): void
    {
        $response = $this->withCookies(['suapToken' => 'token-falso'])
            ->get(route('itens.devolver'));

        $response->assertStatus(200);
        $response->assertSee('_token'); # Verificar se tem proteção CSRF
    }
}
