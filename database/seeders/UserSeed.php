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
            'registration'=>202011011187,
            'password'=>Hash::make(123123123),
            'permission'=>0,
        ]);

        User::create([
            'name'=>'Gabriel Victor ',
            'email'=>'gabriel_victor@gmail.com',
            'registration'=>202011011190,
            'password'=>Hash::make(123123123),
            'permission'=>1,
        ]);
        
    }
}
