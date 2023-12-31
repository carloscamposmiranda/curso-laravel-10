<?php

namespace Database\Seeders;

use App\Models\Vendas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vendas::create(
            [
                'numero_da_venda' => 1,
                'produto_id' => 7,
                'cliente_id' => 3
            ]
        );
        Vendas::create(
            [
                'numero_da_venda' => 2,
                'produto_id' => 1,
                'cliente_id' => 3
            ]
        );
    }
}
