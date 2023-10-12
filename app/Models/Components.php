<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Components extends Model
{
    use HasFactory;

    public function LimpaMascara($valorFormata){
        $tamanho = strlen($valorFormata);
        $dados = str_replace(',', '.', $valorFormata);
        if($tamanho <= 6){
            $dados = str_replace(',', '.', $valorFormata);
        }else{
            if($tamanho >= 8 && $tamanho <= 10){
                $limpaVirgula = str_replace(',', '.', $valorFormata);
                $separaPorIndice = explode('.', $limpaVirgula);
                $dados = $separaPorIndice[0] . $separaPorIndice[1];
            }
        }

        return $dados;
    }
}
