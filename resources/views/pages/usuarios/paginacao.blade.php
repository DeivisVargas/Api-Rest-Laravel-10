

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
        <h1 class="h2">Usuários</h1>
    </div>

    <div class="container">
        {{--Form para fazer uma busca filtrando dados--}}
        <form action="{{route('usuario.index')}}" method="GET">
            <p>Filtrar por:</p>
            <div class="row">
                <div class="col-md-6">
                    <input class="form-control mb-3" type="text" name="pesquisar" placeholder="Nome">
                </div>
                <div class="col-md-6">
                    <input class="form-control mb-3" type="text" name="pesquisarEmail" placeholder="Email">
                </div>
            </div>


            <button class="btn btn-primary" >Pesquisar</button>
            <a type="button" href="{{route('usuario.cadastrar')}}" class="btn btn-success">Cadastrar</a>
        </form>

        <div class="table-responsive mt-3">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th >#</th>
                    <th >Nome</th>
                    <th >email</th>
                    <th >Açoes</th>
                </tr>
                </thead>
                <tbody>

                    @if($findUsuario->isEmpty())
                        <tr>
                            <td class="text-center" colspan="4"><strong>Nenhum dado encontrado</strong></td>
                        </tr>
                    @else

                        @foreach($findUsuario as $usuario)
                            <tr>
                                <td>{{$usuario->id}}</td>
                                <td>{{$usuario->name}}</td>
                                <td>{{$usuario->email}}</td>
                                <td class="">
                                    <a href="{{route('usuario.atualizar', $usuario->id)}}" title="Editar"  class="btn btn-warning btn-sm">Editar</a>

                                    {{--Precisamos de um token para fazer requisições--}}
                                    <a onclick="deletarRegistro('{{route('usuario.delete')}}',{{$usuario->id}})" href="" title="Excluir" class="btn btn-danger btn-sm">Excluir</a>

                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>

    </div>

@endsection