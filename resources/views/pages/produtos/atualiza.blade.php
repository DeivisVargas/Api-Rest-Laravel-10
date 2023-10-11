{{--na marcação que foi feito na index.php
//chamada de @yield('content') serve para demarcar a parte anterior dele , para pode fazer o extends
//esse codigo vai importar tudo da pagina index acima dessa marcação
--}}

@extends('index')

{{-- esse conteudo abaixo vai ser injetado dentro da parte na index que foi demarcada por
@yield('content')
--}}
@section('content')
    <form method="POST" action="{{route('produto.atualizar', $findProduto->id )}}">
        @csrf
        @method('PUT') {{--para definir que será put e temos que manter o post la em cima--}}
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Atualizar Produto</h1>
        </div>
        <div class="row mt-5">
            <div class="col">
                <label for="nome" class="form-label">Nome</label>
                {{--validando com o modelo do FormRequest
                da pra injetar uma classe validando o helper @error
                podemos traduzir tambem a frese no arquivo validate.php
                @old('nome') é para recuperar os dados digitados em caso de falha na validação
                --}}
                <input  type="text" id="nome" name="nome" class="form-control @error('nome') is-invalid @enderror" aria-label="Nome" value="{{isset($findProduto->nome) ? $findProduto->nome : @old('nome')}}">
                @if($errors->has('nome'))
                    <div class="invalid-feedback">{{$errors->first('nome')}}</div>
                @endif
            </div>
            <div class="col">
                <label for="Valor" class="form-label">Valor</label>
                <input type="text" id="valor" name="valor" class="form-control @error('valor') is-invalid @enderror" aria-label="Valor" value="{{isset($findProduto->valor) ? $findProduto->valor : @old('valor')}}">
                @if($errors->has('valor'))
                    <div class="invalid-feedback">{{$errors->first('valor')}}</div>
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
