<?php

use Illuminate\Database\Seeder;

class RanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Rank::create(['name' => 'Banni']);
        \App\Rank::create(['name' => 'Inscrit']);
        \App\Rank::create(['name' => 'Membre']);
        \App\Rank::create(['name' => 'Modo']);
        \App\Rank::create(['name' => 'Admin']);
        \App\Rank::create(['name' => 'Super Admin']);
    }
}
