@extends('app.layouts.basic')

@section('title', 'Pedidos')

@section('main')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Lisgatem de Pedidos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{route('ordered.create')}}">Novo</a></li>
                <li><a href="{{route('app.provider')}}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>ID do pedido</th>
                            <th>Cliente</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ordered as $o)
                            <tr>
                                <td>{{$o->id}}</td>
                                <td>{{$o->customer_id}}</td>
                                <td><a href="{{route('ordered.edit', ['ordered' => $o->id])}}">Editar</a></td>
                                <td><a href="{{route('ordered.show', ['ordered' => $o->id])}}">Visualizar</a></td>
                                <td>
                                    <form id="form_{{$o->id}}" method="POST" action="{{route('ordered.destroy', ['ordered' => $o->id])}}">
                                        @method('DELETE')
                                        @csrf
                                        {{-- <button type="submit">Excluir</button> --}}
                                        <a href="#" onclick="document.getElementById('form_{{$o->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$ordered->appends($request)->links()}}
                <br>
                Exibindo {{$ordered->count()}} de {{$ordered->total()}} resultados.
            </div>
        </div>
    </div>
@endsection