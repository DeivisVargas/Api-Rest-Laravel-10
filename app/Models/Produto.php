<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    //definindo os campos a serem usados
    //para permitir inserção
    protected $fillable = [
        'nome',
        'valor'
    ] ;

    public function getProdutosPesquisarIndex(string $pesquisar = '')
    {


        //Pesquisando com filtro na tabela
        //caso nao encontrar a pesquisa retorna vazio
        $produto = $this->where( function ($query) use ($pesquisar){
            if($pesquisar){
                $query->where('nome' ,$pesquisar);
                $query->orWhere('nome', 'LIKE' , "%{$pesquisar}%");
            }
        })->get();

        return $produto ;

    }
}
