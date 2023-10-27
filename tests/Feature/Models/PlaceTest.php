<?php

namespace Tests\Feature\Models;

use App\Models\Place;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlaceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Testa se cria um local.
     */
    public function test_cria_local(): void
    {
        $local = Place::factory()->create();
        $this->assertModelExists($local);
    }

        
    /**
     * Testa se altera um local.
     */
    public function test_altera_local(): void
    {
        $local = Place::factory()->create();

        $novo_nome = 'Meu Local';
        $local->name = $novo_nome;
        $local->save();

        $this->assertDatabaseHas('places', [
            'name' => $novo_nome
        ]);
    }


    /**
     * Testa se apaga um local.
     */
    public function test_apaga_local(): void
    {
        $local = Place::factory()->create();

        $local->delete();

        $this->assertModelMissing($local);
    }
}
