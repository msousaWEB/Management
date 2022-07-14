@extends('app.layouts.basic')

@section('title', 'Produtos')

@section('main')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Lisgatem de Produtos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{route('app.provider.add')}}">Novo</a></li>
                <li><a href="{{route('app.provider')}}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Peso</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $p)
                            <tr>
                                <td>{{$p->unit_id}}</td>
                                <td>{{$p->name}}</td>
                                <td>{{$p->description}}</td>
                                <td>{{$p->weight}}</td>
                                <td><a href="{{route('app.provider.edit', $p->id)}}">Editar</a></td>
                                <td><a href="{{route('app.provider.delete', $p->id)}}">Excluir</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$products->appends($request)->links()}}
                <br>
                Exibindo {{$products->count()}} de {{$products->total()}} resultados.
            </div>
        </div>
    </div>
@endsection