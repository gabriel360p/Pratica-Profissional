<?php

namespace Tests\Feature\Models;

use App\Models\Material;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MaterialTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Testa se cria um material.
     */
    public function test_cria_material(): void
    {
        $material = Material::factory()->create();
        $this->assertModelExists($material);
    }

        
    /**
     * Testa se altera um material.
     */
    public function test_altera_material(): void
    {
        $material = Material::factory()->create();

        $novo_nome = 'Meu Material';
        $material->nome = $novo_nome;
        $material->save();

        $this->assertDatabaseHas('materiais', [
            'nome' => $novo_nome
        ]);
    }


    /**
     * Testa se apaga um material.
     */
    public function test_apaga_material(): void
    {
        $material = Material::factory()->create();

        $material->delete();

        $this->assertModelMissing($material);
    }
}
