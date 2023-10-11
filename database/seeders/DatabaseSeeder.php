<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //necessário fazer a chamada dos seeders que vc que executar neste arquivo
        //caso contrario ele não vai executar os seeder
        $this->call([
            ProdutosSeeder::class ,
            VendasSeeder::class,
            UsuarioSeeder::class,
        ]);
    }
}
