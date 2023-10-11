@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard de vendas</h1>
    </div>

    <div class="row mt-3">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Produtos cadastrados</h5>
                    <p class="card-text">Total de produtos cadastrados no sistema.</p>
                    <a href="#" class="btn btn-primary">{{$totalDeProduto}}</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Clientes cadastrados</h5>
                    <p class="card-text">Total de clientes cadastrados no sistema.</p>
                    <a href="#" class="btn btn-primary">{{$totalDeClientes}}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Vendas cadastradas</h5>
                    <p class="card-text">Total de vendas cadastrados no sistema.</p>
                    <a href="#" class="btn btn-primary">{{$totalDeVendas}}</a>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Usuários cadastrados</h5>
                    <p class="card-text">Total de usuários cadastrados </p>
                    <a href="#" class="btn btn-primary">{{$totalDeUsuarios}}</a>
                </div>
            </div>
        </div>
    </div>

@endsection