{{--na marcação que foi feito na index.php
//chamada de @yield('content') serve para demarcar a parte anterior dele , para pode fazer o extends
//esse codigo vai importar tudo da pagina index acima dessa marcação
--}}

@extends('index')

{{-- esse conteudo abaixo vai ser injetado dentro da parte na index que foi demarcada por
@yield('content')
--}}
@section('content')
    <form method="POST" action="{{route('venda.cadastrar')}}">
        @csrf
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Cadastro Venda</h1>
        </div>
        <input id="numero_da_venda" name="numero_da_venda" value="{{$numero}}" type="hidden">
        <div class="row mt-3">
            <div class="col-12 mt-2">
                <label for="numero_da_venda" class="form-label">Numero da venda</label>
                {{--validando com o modelo do FormRequest
                da pra injetar uma classe validando o helper @error
                podemos traduzir tambem a frese no arquivo validate.php
                @old('nome') é para recuperar os dados digitados em caso de falha na validação
                --}}
                <input disabled   type="text" id="n_venda" name="n_venda" class="form-control @error('n_venda') is-invalid @enderror" aria-label="n_venda" value="{{$numero}}">
                @if($errors->has('n_venda'))
                    <div class="invalid-feedback">{{$errors->first('n_venda')}}</div>
                @endif
            </div>
            <div class="col-12 mt-2">
                <label for="produto_id" class="form-label">Produto</label>

                <select name="produto_id" id="produto_id" class="form-select  @error('produto_id') is-invalid @enderror" area-label="Selecione um produto">
                    <option value="">--Selecione o Produto</option>
                    @foreach($produtos as $produto)
                        <option value="{{$produto->id}}">{{$produto->nome}}</option>
                    @endforeach
                </select>
                 @if($errors->has('produto_id'))
                    <div class="invalid-feedback">{{$errors->first('produto_id')}}</div>
                @endif
            </div>
            <div class="col-12 mt-2">
                <label for="cliente_id" class="form-label">Cliente</label>
                <select name="cliente_id" id="cliente_id" class="form-select  @error('cliente_id') is-invalid @enderror" area-label="Selecione um cliente">
                    <option value="">--Selecione o Cliente</option>
                    @foreach($clientes as $cleinte)
                        <option value="{{$cleinte->id}}">{{$cleinte->nome}}</option>
                    @endforeach
                </select>@if($errors->has('cliente_id'))
                    <div class="invalid-feedback">{{$errors->first('cliente_id')}}</div>
                @endif
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-3">
                <button class="btn btn-success">Salvar</button>
            </div>
        </div>
    </form>

@endsection
