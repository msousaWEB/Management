@extends('app.layouts.basic')

@section('title', 'Produto')

@section('main')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Produto - Adicionar</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{route('product.index')}}">Voltar</a></li>
                <li><a href="{{route('app.provider')}}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                {{$msg ?? ''}}
                @component('app.product._components.form_create_edit', ['unit' => $unit, 'providers' => $providers])
                @endcomponent
            </div>
        </div>
    </div>
@endsection