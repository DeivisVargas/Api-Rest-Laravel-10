<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_da_venda' ,
        'produto_id' ,
        'cliente_id'
    ];

    //a venda depende de um produto e de um cliente
    //então devemos criar esse relacionamento
    public  function produto(){
        return $this->belongsTo(Produto::class);
    }

    //carrega os dados do cliente atrves da chave estrangeira contida na tabela e crio o objeto
    //cliente dentro da model
    public  function cliente(){
        return $this->belongsTo(Cliente::class);
    }


    public function getVendasPesquisarIndex(string $pesquisar = '')
    {

        //Pesquisando com filtro na tabela
        //caso nao encontrar a pesquisa retorna vazio
        $produto = $this->where( function ($query) use ($pesquisar){
            if($pesquisar){
                $query->where('numero_da_venda' ,$pesquisar);
                $query->orWhere('numero_da_venda', 'LIKE' , "%{$pesquisar}%");
            }
        })->get();

        return $produto ;

    }


}
