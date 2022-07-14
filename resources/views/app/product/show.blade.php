@extends('app.layouts.basic')

@section('title', 'Produto')

@section('main')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Produto - Visualizar</p>
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
                <table border="1" style="text-align: left">
                    <tr>
                        <td>ID:</td>
                        <td>{{$product->id}}</td>
                    </tr>
                    <tr>
                        <td>Nome:</td>
                        <td>{{$product->name}}</td>
                    </tr>
                    <tr>
                        <td>Descrição:</td>
                        <td>{{$product->description}}</td>
                    </tr>
                    <tr>
                        <td>Peso:</td>
                        <td>{{$product->weight}} Kg</td>
                    </tr>
                    <tr>
                        <td>Unidade de Medida:</td>
                        <td>{{$product->unit_id}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection