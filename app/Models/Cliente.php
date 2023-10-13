<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nmcliente',
        'email',
        'endereco',
        'logradouro',
        'cep',
        'bairro',
    ];

    public function getClientePesquisa(string $search)
    {
        $cliente = $this->where(function ($query) use ($search)
        {
            if($search)
            {
                $query->where('nmcliente', $search);
                $query->orWhere('nmcliente', 'LIKE', "%{$search}%");
            }
        })->get();

        return $cliente;
    }
}
