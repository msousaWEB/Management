@extends('app.layouts.basic')

@section('title', 'Pedido')

@section('main')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Pedido - Adicionar</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{route('ordered.index')}}">Voltar</a></li>
                <li><a href="{{route('app.provider')}}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                {{$msg ?? ''}}
                @component('app.ordered._components.form_create_edit', ['customers' => $customers])
                @endcomponent
            </div>
        </div>
    </div>
@endsection