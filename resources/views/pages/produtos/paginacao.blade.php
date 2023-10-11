

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
        <h1 class="h2">Produtos</h1>
    </div>

    <div class="container">
        {{--Form para fazer uma busca filtrando dados--}}
        <form action="{{route('produto.index')}}" method="GET">
            <input class="form-control mb-3" type="text" name="pesquisar" placeholder="Digite o nome">
            <button class="btn btn-primary" >Pesquisar</button>
            <a type="button" href="{{route('produto.cadastrar')}}" class="btn btn-success">Cadastrar</a>
        </form>

        <div class="table-responsive mt-3">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th >#</th>
                    <th >Nome</th>
                    <th >Valor</th>
                    <th >Açoes</th>
                </tr>
                </thead>
                <tbody>

                    @if($findProduto->isEmpty())
                        <tr>
                            <td class="text-center" colspan="4"><strong>Nenhum dado encontrado</strong></td>
                        </tr>
                    @else

                        @foreach($findProduto as $produto)
                            <tr>
                                <td>{{$produto->id}}</td>
                                <td>{{$produto->nome}}</td>
                                <td>{{ 'R$ '. number_format($produto->valor,2, ',' , '.')}}</td>
                                <td class="">
                                    <a href="{{route('produto.atualizar', $produto->id)}}" title="Editar"  class="btn btn-warning btn-sm">Editar</a>


                                    {{--Precisamos de um token para fazer requisições--}}

                                    <a onclick="deletarRegistro('{{route('produto.delete')}}',{{$produto->id}})" href="" title="Excluir" class="btn btn-danger btn-sm">Excluir</a>

                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>

    </div>

@endsection