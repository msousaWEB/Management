@extends('app.layouts.basic')

@section('title', 'Cliente')

@section('main')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor - Listar</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{route('app.provider.add')}}">Novo</a></li>
                <li><a href="{{route('app.provider')}}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                ...Listar...
            </div>
        </div>
    </div>
@endsection