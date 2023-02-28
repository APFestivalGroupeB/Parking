<?php

namespace Database\Seeders;

use Database\Factories\PlaceFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PlaceFactory::factory()->count(50)->create();

       
    }


}