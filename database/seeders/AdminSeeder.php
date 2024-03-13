<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $password = '12341234';

        $pass = Hash::make($password);


        Admin::factory()->create([
            'name' => 'Ahmed Ait Brik',
            'phone' => '0600000000',
            'userName' => 'Ahmed0290',
            'password'=> $pass  ,
            'role'=> 'admin'  ,
            'code'=> '12341234'  ,
        ]);
    }
}
