{{--na marcação que foi feito na index.php
//chamada de @yield('content') serve para demarcar a parte anterior dele , para pode fazer o extends
//esse codigo vai importar tudo da pagina index acima dessa marcação
--}}

@extends('index')

{{-- esse conteudo abaixo vai ser injetado dentro da parte na index que foi demarcada por
@yield('content')
--}}
@section('content')
    <form method="POST" action="{{route('cliente.cadastrar')}}">
        @csrf
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Cadastro novo Cliente</h1>
        </div>
        <div class="row mt-5">
            <div class="col col-sm-12">
                <label for="nome" class="form-label">Nome</label>
                {{--validando com o modelo do FormRequest
                da pra injetar uma classe validando o helper @error
                podemos traduzir tambem a frese no arquivo validate.php
                @old('nome') é para recuperar os dados digitados em caso de falha na validação
                --}}
                <input  type="text" id="nome" name="nome" class="form-control @error('nome') is-invalid @enderror" aria-label="Nome" value="{{@old('nome')}}">
                @if($errors->has('nome'))
                    <div class="invalid-feedback">{{$errors->first('nome')}}</div>
                @endif
            </div>
            <div class="col  col-sm-12">
                <label for="email" class="form-label">Email</label>
                <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" aria-label="email" value="{{@old('email')}}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">{{$errors->first('email')}}</div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col  col-sm-12">
                <label for="cep" class="form-label">Cep</label>
                <input type="text" id="cep" name="cep" class="form-control @error('cep') is-invalid @enderror" aria-label="cep" value="{{@old('cep')}}">
                @if($errors->has('cep'))
                    <div class="invalid-feedback">{{$errors->first('cep')}}</div>
                @endif
            </div>

            <div class="col  col-sm-12">
                <label for="logradouro" class="form-label">Logradouro</label>
                <input type="text" id="logradouro" name="logradouro" class="form-control @error('logradouro') is-invalid @enderror" aria-label="logradouro" value="{{@old('logradouro')}}">
                @if($errors->has('logradouro'))
                    <div class="invalid-feedback">{{$errors->first('logradouro')}}</div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col  col-sm-12">
                <label for="endereco" class="form-label">Endereço</label>
                <input type="text" id="endereco" name="endereco" class="form-control @error('endereco') is-invalid @enderror" aria-label="endereco" value="{{@old('endereco')}}">
                @if($errors->has('endereco'))
                    <div class="invalid-feedback">{{$errors->first('endereco')}}</div>
                @endif
            </div>

            <div class="col  col-sm-12">
                <label for="bairro" class="form-label">Bairro</label>
                <input type="text" id="bairro" name="bairro" class="form-control @error('bairro') is-invalid @enderror" aria-label="bairro" value="{{@old('bairro')}}">
                @if($errors->has('bairro'))
                    <div class="invalid-feedback">{{$errors->first('bairro')}}</div>
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
