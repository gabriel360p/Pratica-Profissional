<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categorie;

class CategorieSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categorie::create(['name'=>'Todos']);
        Categorie::create(['name'=>'Basquete']);
        Categorie::create(['name'=>'Futebol']);
        Categorie::create(['name'=>'Natação']);
        Categorie::create(['name'=>'Voleibol']);
        Categorie::create(['name'=>'Medalhas']);
        Categorie::create(['name'=>'Troféus']);
        Categorie::create(['name'=>'Fardamento']);
        Categorie::create(['name'=>'Permanente']);
        Categorie::create(['name'=>'Consumo']);
        Categorie::create(['name'=>'Outros']);
    }
}
