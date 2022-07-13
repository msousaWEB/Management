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
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Site</th>
                            <th>UF</th>
                            <th>Email</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($providers as $p)
                            <tr>
                                <td>{{$p->name}}</td>
                                <td>{{$p->site}}</td>
                                <td>{{$p->uf}}</td>
                                <td>{{$p->email}}</td>
                                <td>Excluir</td>
                                <td><a href="{{route('app.provider.edit', $p->id)}}">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$providers->appends($request)->links()}}
            </div>
        </div>
    </div>
@endsection