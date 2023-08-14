<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'Mariana Freitas',
            'email'=>'mariana_freitas@gmail.com',
            'matricula'=>202011011187,
            'password'=>Hash::make(123123123),
        ]);

        
    }
}
