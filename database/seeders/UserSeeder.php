<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('utilisateur')->insert([
            'nom' => 'Super',
            'prenom' => 'Admin',
            'telephone' => null,
            'email' => 'admin@parking.com',
            'password' => Hash::make('secret'),
            'est_valide' => true,
            'est_admin' => true,
            'position' => null,
        ]);

        DB::table('utilisateur')->insert([
            'nom' => 'Utilisateur',
            'prenom' => 'Utilisateur',
            'telephone' => null,
            'email' => 'util@parking.com',
            'password' => Hash::make('secret'),
            'est_valide' => false,
            'est_admin' => false,
            'position' => null,
        ]);
    }

  
    
    
}
