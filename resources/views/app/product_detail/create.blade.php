@extends('app.layouts.basic')

@section('title', 'Detalhes do Produto')

@section('main')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Detalhes Produto - Adicionar Detalhes</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{route('product.index')}}">Voltar</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                {{$msg ?? ''}}
                @component('app.product_detail._components.form_create_edit', ['unit' => $unit])
                @endcomponent
            </div>
        </div>
    </div>
@endsection