<?php

namespace Database\Seeders;

use App\Models\Place as Local;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Local::create(['name' => 'Ginásio']);
        Local::create(['name' => 'Sala dos Servidores']);
        Local::create(['name' => 'COAPAC']);
        Local::create(['name' => 'Academia']);
    }
}
