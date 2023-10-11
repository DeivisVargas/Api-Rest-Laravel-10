<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Cliente;
use App\Models\Venda;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $totalDeProduto = $this->buscarTotalProduto();
        $totalDeClientes = $this->BuscarClintes();
        $totalDeVendas = $this->buscarTotalVendas();
        $totalDeUsuarios = $this->buscarTotalUsuarios();


        return view('pages.dashboard.dashboard' ,compact('totalDeProduto', 'totalDeClientes' , 'totalDeVendas', 'totalDeUsuarios'));
    }

    public function buscarTotalProduto()
    {
        return Produto::all()->count();

    }

    public function BuscarClintes(){
        return Cliente::all()->count();
    }

    //buscar total de vendas
    public function buscarTotalVendas()
    {
        return Venda::all()->count();
    }


    public function buscarTotalUsuarios()
    {
        return User::all()->count();
    }

}
