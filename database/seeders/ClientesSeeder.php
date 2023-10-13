<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientesSeeder extends Seeder
{
    public function run(): void
    {
       Cliente::create(
        [
            'nmcliente' => 'André Silva Pereira',
            'email' => 'andre.silva@example.com',
            'endereco' => 'Rua dos Pinheiros, 321',
            'logradouro' => 'Rua dos Pinheiros, 321',
            'cep' => '05442-111',
            'bairro' => 'Pinheiros',
        ]
        );
    }
}
