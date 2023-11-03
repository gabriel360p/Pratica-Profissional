<?php

namespace Tests\Feature\Models;

use App\Models\Item;
use App\Models\Local;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * @covers \App\Models\Item
 */
class ItemTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('db:seed --class=CategoriaSeeder');
        $this->artisan('db:seed --class=LocalSeeder');
        $this->artisan('db:seed --class=MaterialSeeder');
    }

    /**
     * Testa se cria um item.
     */
    public function test_cria_item(): void
    {
        $item = Item::factory()->create();
        $this->assertModelExists($item);
    }


    /**
     * Testa se altera um item.
     */
    public function test_altera_item(): void
    {
        $item = Item::factory()->create();

        $novo_estado_conservacao = 'Outro estado de conservação';
        $item->estado_conservacao = $novo_estado_conservacao;
        $item->save();

        $this->assertDatabaseHas('itens', [
            'estado_conservacao' => $novo_estado_conservacao
        ]);
    }


    /**
     * Testa se apaga um item.
     */
    public function test_apaga_item(): void
    {
        $item = Item::factory()->create();

        $item->delete();

        $this->assertModelMissing($item);
    }


    /**
     * Testa se salva o local.
     */
    public function test_salva_local(): void
    {
        $local = Local::factory()->create();

        Item::factory()->create(['local_id' => $local->id]);

        $this->assertDatabaseHas('itens', ['local_id' => $local->id]);
    }


    /**
     * Testa se altera o local.
     */
    public function test_altera_local(): void
    {
        $local1 = Local::factory()->create();
        $local2 = Local::factory()->create();
        $item = Item::factory()->create(['local_id' => $local1->id]);

        $item->local()->associate($local2);
        $item->save();

        $this->assertDatabaseMissing('itens', ['local_id' => $local1->id]);
        $this->assertDatabaseHas('itens', ['local_id' => $local2->id]);
    }
}
