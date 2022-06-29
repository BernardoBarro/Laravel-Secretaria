<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cargo;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cargo::create(['nome' => 'Presidente', 'descricao' => 'Presidia o clube']);
        Cargo::create(['nome' => 'Vice-Presidente', 'descricao' => 'Próximo presidente']);
        Cargo::create(['nome' => 'Secretário', 'descricao' => 'Cuida da parte burocrática do clube']);
        Cargo::create(['nome' => 'Tesoureiro', 'descricao' => 'Cuida da parte financeira do clube']);
        Cargo::create(['nome' => 'Protocolo', 'descricao' => 'Cuida da parte formal das reuniões e eventos']);
    }
}
