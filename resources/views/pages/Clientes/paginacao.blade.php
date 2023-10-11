

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
        <form action="{{route('cliente.index')}}" method="GET">
            <input class="form-control mb-3" type="text" name="pesquisar" placeholder="Digite o nome">
            <button class="btn btn-primary" >Pesquisar</button>
            <a type="button" href="{{route('cliente.cadastrar')}}" class="btn btn-success">Cadastrar</a>
        </form>

        <div class="table-responsive mt-3">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Endereço</th>
                    <th>Logradouro</th>
                    <th>Cep</th>
                    <th>Bairro</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>

                    @if($findCliente->isEmpty())
                        <tr>
                            <td class="text-center" colspan="8"><strong>Nenhum dado encontrado</strong></td>
                        </tr>
                    @else

                        @foreach($findCliente as $cliente)
                            <tr>
                                <td>{{$cliente->id}}</td>
                                <td>{{$cliente->nome}}</td>
                                <td>{{$cliente->email}}</td>
                                <td>{{$cliente->endereco}}</td>
                                <td>{{$cliente->logradouro}}</td>
                                <td>{{$cliente->cep}}</td>
                                <td>{{$cliente->bairro}}</td>
                                <td class="">
                                    <a href="{{route('cliente.atualizar', $cliente->id)}}" title="Editar cliente"  class="btn btn-warning btn-sm">Editar</a>


                                    {{--Precisamos de um token para fazer requisições--}}

                                    <a onclick="deletarRegistro('{{route('cliente.delete')}}',{{$cliente->id}})" href="" title="Excluir" class="btn btn-danger btn-sm">Excluir</a>

                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>

    </div>

@endsection