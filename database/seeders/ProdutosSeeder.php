<?php

namespace Database\Seeders;

use App\Models\Produto; //importanto o model
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdutosSeeder extends Seeder
{

    public function run(): void
    {
        //Devemos fazer o inport do model
        Produto::create(
            [
                'nome'  => 'Deivis' ,
                'valor' => 12.00
            ]
        );
    }
}
