<?php

namespace Tests\Feature\Controllers;

use \App\Models\Categorie as Categorie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\TestCase;

#[CoversClass('\App\Http\Controllers\CategorieController')]
class CategorieControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('db:seed'); # TODO: Investigar por que isto é necessário
    }

    /**
     * Testar se exibe a lista de categorias.
     */
    public function test_CategorieController_index(): void
    {
        $response = $this->withCookies(['suapToken' => 'token-falso'])
            ->get(route('categorias.index'));

        $response->assertStatus(200);
        # TODO: $response->assertSee('Basquete');
    }

    /**
     * Testar se exibe a página de criação.
     */
    public function test_CategorieController_create(): void
    {
        $response = $this->withCookies(['suapToken' => 'token-falso'])
            ->get(route('categorias.create'));

        $response->assertStatus(200);
        $response->assertSee('_token'); # Verificar se tem proteção CSRF
    }

    /**
     * Testar se exibe a página de edição.
     */
    public function test_CategorieController_edit(): void
    {
        $categoria = Categorie::first();

        $response = $this
            ->withCookies(['suapToken' => 'token-falso'])
            ->get(route('categorias.edit', $categoria));

        $response->assertStatus(200);
        $response->assertSee('_token'); # Verificar se tem proteção CSRF
    }

    /**
     * Testar se deleta uma categoria.
     */
    public function test_CategorieController_delete(): void
    {
        $categoria = Categorie::first();
        $total = Categorie::count();

        $this->withCookies(['suapToken' => 'token-falso'])
            ->get(route('categorias.delete', $categoria));

        $this->assertModelMissing($categoria);
        $this->assertDatabaseCount('categories', $total - 1);
    }

    /**
     * Testar se atualiza uma categoria.
     * TODO: Verificar por que não está contando no relatório de cobertura.
     */
    public function test_CategorieController_update(): void
    {
        $categoria = Categorie::first();

        $dados = ['name' => 'novo_nome'];
        $this->withCookies(['suapToken' => 'token-falso'])
            # TODO: Deveria ser ->patch(route('categorias.update', $categoria));
            ->patch(route('categorias.update', $categoria), $dados);

        $this->assertDatabaseHas('categories', $dados);
    }

    /**
     * Testar se cria uma categoria.
     */
    public function test_CategorieController_store(): void
    {
        $dados = ['name' => 'Minha nova categoria'];
        $total = Categorie::count();

        $this->withCookies(['suapToken' => 'token-falso'])
            ->post(route('categorias.store'), $dados);
            
        $this->assertDatabaseHas('categories', ['name' => $dados['name']]);
        $this->assertDatabaseCount('categories', $total + 1);
    }
}
