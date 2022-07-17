@extends('app.layouts.basic')

@section('title', 'Produtos')

@section('main')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Lisgatem de Produtos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{route('product.create')}}">Novo</a></li>
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
                            <th>Fornecedor</th>
                            <th>Peso</th>
                            <th>Comprimento</th>
                            <th>Largura</th>
                            <th>Altura</th>
                            <th></th>
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
                                <td>{{$p->provider->name}}</td>
                                <td>{{$p->weight}} Kg</td>
                                <td>{{$p->productDetail->length ?? '-'}} </td>
                                <td>{{$p->productDetail->width ?? '-'}}</td>
                                <td>{{$p->productDetail->height ?? '-'}} </td>
                                <td><a href="{{route('product.edit', ['product' => $p->id])}}">Editar</a></td>
                                <td><a href="{{route('product.show', ['product' => $p->id])}}">Visualizar</a></td>
                                <td>
                                    <form id="form_{{$p->id}}" method="POST" action="{{route('product.destroy', ['product' => $p->id])}}">
                                        @method('DELETE')
                                        @csrf
                                        {{-- <button type="submit">Excluir</button> --}}
                                        <a href="#" onclick="document.getElementById('form_{{$p->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
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