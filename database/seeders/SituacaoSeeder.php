<?php

namespace Database\Seeders;

use App\Models\Situacao;
use Illuminate\Database\Seeder;

class SituacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Situacao::create(['nome' => 'Aberto']);
        Situacao::create(['nome' => 'Em Andamento']);
        Situacao::create(['nome' => 'Concluído']);
    }
}
