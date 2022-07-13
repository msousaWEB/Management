@extends('app.layouts.basic')

@section('title', 'Cliente')

@section('main')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor - Adicionar</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{route('app.provider.add')}}">Novo</a></li>
                <li><a href="{{route('app.provider')}}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                {{$msg ?? ''}}
                <form method="POST" action="{{route('app.provider.add')}}">
                    <input type="hidden" name="id" value="{{$provider->id ?? ''}}">
                    @csrf
                    <input type="text" name="name" value="{{$provider->name ?? old('name')}}" class="borda-preta" placeholder="Nome">
                    {{$errors->has('name') ? $errors->first('name') : ''}}

                    <input type="text" name="site" value="{{$provider->site ?? old('site')}}" class="borda-preta" placeholder="Site">
                    {{$errors->has('site') ? $errors->first('site') : ''}}

                    <input type="text" name="uf" value="{{$provider->uf ?? old('uf')}}" class="borda-preta" placeholder="UF">
                    {{$errors->has('uf') ? $errors->first('uf') : ''}}

                    <input type="text" name="email" value="{{$provider->email ?? old('email')}}" class="borda-preta" placeholder="E-mail">
                    {{$errors->has('email') ? $errors->first('email') : ''}}

                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection