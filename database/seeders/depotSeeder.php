<?php

namespace Database\Seeders;

use App\Models\Depot;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class depotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Depot::factory()->create([
            'name' => 'Aucun',
            'adress' => 'Aucun',
        ]);
    }
}
