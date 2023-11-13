<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Categoria;
use App\Models\Local;
use Illuminate\Database\Seeder;
use Illuminate\Validation\Rules\Can;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Local::create(['nome' => 'Ginásio']);
        Local::create(['nome' => 'Amário 1']);
        Local::create(['nome' => 'Amário 2']);
        Local::create(['nome' => 'Amário 3']);
        Local::create(['nome' => 'Amário 4']);
        Local::create(['nome' => 'COAPAC']);

        Categoria::create(['nome'=>'Basquete']);
        Categoria::create(['nome'=>'Futebol']);
        Categoria::create(['nome'=>'Natação']);
        Categoria::create(['nome'=>'Voleibol']);
        Categoria::create(['nome'=>'Medalhas']);
        Categoria::create(['nome'=>'Troféus']);
        Categoria::create(['nome'=>'Fardamento']);
        Categoria::create(['nome'=>'Permanente']);
        Categoria::create(['nome'=>'Consumo']);
        Categoria::create(['nome'=>'Outros']);

        // $this->call(
        //     CategorieSeed::class,
        // );
    }
}
