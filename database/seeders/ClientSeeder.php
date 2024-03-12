<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Client::factory()->create([
            'name' => 'Aucun',
            'phone' => 'Aucun',
            'adress' => 'Aucun',
            'city'=> 'Aucun'  ,
        ]);
    }
}
