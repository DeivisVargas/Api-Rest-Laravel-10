{{--na marcação que foi feito na index.php
//chamada de @yield('content') serve para demarcar a parte anterior dele , para pode fazer o extends
//esse codigo vai importar tudo da pagina index acima dessa marcação
--}}

@extends('index')


{{-- esse conteudo abaixo vai ser injetado dentro da parte na index que foi demarcada por
@yield('content')
--}}
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Vendas</h1>
    </div>

    <div class="container">
        {{--Form para fazer uma busca filtrando dados--}}
        <form action="{{route('venda.index')}}" method="GET">
            <input class="form-control mb-3" type="text" name="pesquisar" placeholder="Digite o nome">
            <button class="btn btn-primary">Pesquisar</button>
            <a type="button" href="{{route('venda.cadastrar')}}" class="btn btn-success">Cadastrar</a>
        </form>

        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>Numero</th>
                <th>Produto</th>
                <th>Cliente</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>

            @if($findVendas->isEmpty())
                <tr>
                    <td class="text-center" colspan="8"><strong>Nenhuma venda encontrada</strong></td>
                </tr>
            @else

                @foreach($findVendas as $venda)
                    <tr>
                        <td>{{$venda->numero_da_venda}}</td>
                        <td>{{$venda->produto->nome}}</td>
                        <td>{{$venda->cliente->nome}}</td>
                        <td class="">
                            <a href="{{route('enviaComprovanteEmail.venda' , $venda->id )}}" title="Editar"
                               class="btn btn-warning btn-sm">Enviar email</a>

                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>










    </div>

@endsection