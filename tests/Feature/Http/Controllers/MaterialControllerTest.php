<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Material;
use PHPUnit\Framework\Attributes\CoversClass;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

#[CoversClass('\App\Http\Controllers\MaterialController')]
class MaterialControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('db:seed --class=MaterialSeeder');
        $this->artisan('db:seed --class=SessionSeeder');
    }

    /**
     * TODO: Testar se exibe a lista de materiais.
     */
    public function TODO_test_MaterialController_index(): void
    {
        $response = $this->withCookies(['suapToken' => 'token-falso'])
            ->get(route('materiais.index'));

        $response->assertStatus(200);
        # TODO: $response->assertSee('Basquete');
    }

    /**
     * Testar se exibe a página de criação.
     */
    public function test_MaterialController_create(): void
    {
        $response = $this->withCookies(['suapToken' => 'token-falso'])
            ->get(route('materiais.create'));

        $response->assertStatus(200);
        $response->assertSee('_token'); # Verificar se tem proteção CSRF
    }

    /**
     * TODO: Testar se exibe a página de edição.
     */
    public function TODO_test_MaterialController_edit(): void
    {
        $material = Material::first();

        $response = $this
            ->withCookies(['suapToken' => 'token-falso'])
            ->get(route('materiais.edit', $material));

        $response->assertStatus(200);
        $response->assertSee('_token'); # Verificar se tem proteção CSRF
    }

    /**
     * TODO: Testar se deleta um material.
     */
    public function TODO_test_MaterialController_delete(): void
    {
        $material = Material::first();
        $total = Material::count();

        $this->withCookies(['suapToken' => 'token-falso'])
            ->get(route('materiais.delete', $material));

        $this->assertModelMissing($material);
        $this->assertDatabaseCount('materiais', $total - 1);
    }

    /**
     * TODO: Testar se atualiza um material.
     */
    public function TODO_test_MaterialController_update(): void
    {
        $material = Material::first();

        $dados = ['nome' => 'novo_nome'];
        $this->withCookies(['suapToken' => 'token-falso'])
            ->patch(route('materiais.update', $material), $dados);

        $this->assertDatabaseHas('materiais', $dados);
    }

    /**
     * Testar se cria um material.
     */
    public function test_MaterialController_store(): void
    {
        $dados = ['nome' => 'Novo Material'];
        $total = Material::count();

        $this->withCookies(['suapToken' => 'token-falso'])
            ->post(route('materiais.store'), $dados);
            
        $this->assertDatabaseHas('materiais', $dados);
        $this->assertDatabaseCount('materiais', $total + 1);
    }
}
