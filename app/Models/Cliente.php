<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    //para permitir inserção
    protected $fillable = [
        'nome','email' , 'endereco' , 'logradouro' , 'cep', 'bairro'
    ];

    public function getClientesPesquisarIndex(string $pesquisar = '')
    {

        //Pesquisando com filtro na tabela
        //caso nao encontrar a pesquisa retorna vazio
        $cliente = $this->where( function ($query) use ($pesquisar){
            if($pesquisar){
                $query->where('nome' ,$pesquisar);
                $query->orWhere('nome', 'LIKE' , "%{$pesquisar}%");
            }
        })->get();

        return $cliente ;

    }
}
