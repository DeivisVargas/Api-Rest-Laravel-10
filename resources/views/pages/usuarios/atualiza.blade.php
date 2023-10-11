{{--na marcação que foi feito na index.php
//chamada de @yield('content') serve para demarcar a parte anterior dele , para pode fazer o extends
//esse codigo vai importar tudo da pagina index acima dessa marcação
--}}

@extends('index')

{{-- esse conteudo abaixo vai ser injetado dentro da parte na index que foi demarcada por
@yield('content')
--}}
@section('content')

    <form method="POST" action="{{route('usuario.atualizar', $findUsuario->id )}}">
        @csrf
        @method('PUT') {{--para definir que será put e temos que manter o post la em cima--}}
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Atualizar Usuários</h1>
        </div>
        <div class="row mt-5">
            <div class="col">
                <label for="name" class="form-label">Nome</label>
                {{--validando com o modelo do FormRequest
                da pra injetar uma classe validando o helper @error
                podemos traduzir tambem a frese no arquivo validate.php
                @old('nome') é para recuperar os dados digitados em caso de falha na validação
                --}}
                <input  type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" aria-label="Nome" value="{{isset($findUsuario->name) ? $findUsuario->name : @old('name')}}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">{{$errors->first('name')}}</div>
                @endif
            </div>
            <div class="col">
                <label for="email" class="form-label">Email</label>
                <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" aria-label="Valor" value="{{isset($findUsuario->email) ? $findUsuario->email : @old('email')}}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">{{$errors->first('email')}}</div>
                @endif
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <label for="password" class="form-label">Nova Senha</label>
                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" aria-label="Valor" value="">
                @if($errors->has('password'))
                    <div class="invalid-feedback">{{$errors->first('password')}}</div>
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
