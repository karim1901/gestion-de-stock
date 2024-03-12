<?php

namespace Database\Seeders;

use App\Models\Fournisseur;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class fournisseurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Fournisseur::factory()->create([
            'name' => 'Aucun',
            'phone' => 'Aucun',
            'adress' => 'Aucun',
            'email'=> 'Aucun'  ,
            'id_admin'=> 1  ,
        ]);
    }
}
