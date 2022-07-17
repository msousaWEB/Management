@extends('app.layouts.basic')

@section('title', 'Cliente')

@section('main')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Lisgatem de Clientes</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{route('customer.create')}}">Novo</a></li>
                <li><a href="{{route('app.provider')}}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $c)
                            <tr>
                                <td>{{$c->name}}</td>
                                <td><a href="{{route('customer.edit', ['customer' => $c->id])}}">Editar</a></td>
                                <td><a href="{{route('customer.show', ['customer' => $c->id])}}">Visualizar</a></td>
                                <td>
                                    <form id="form_{{$c->id}}" method="POST" action="{{route('customer.destroy', ['customer' => $c->id])}}">
                                        @method('DELETE')
                                        @csrf
                                        {{-- <button type="submit">Excluir</button> --}}
                                        <a href="#" onclick="document.getElementById('form_{{$c->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$customers->appends($request)->links()}}
                <br>
                Exibindo {{$customers->count()}} de {{$customers->total()}} resultados.
            </div>
        </div>
    </div>
@endsection