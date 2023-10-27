<?php

namespace Database\Seeders;

use App\Models\Place;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Place::create(['name' => 'Ginásio']);
        Place::create(['name' => 'Sala dos Servidores']);
        Place::create(['name' => 'COAPAC']);
        Place::create(['name' => 'Academia']);
    }
}
