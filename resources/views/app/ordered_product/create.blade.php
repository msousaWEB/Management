@extends('app.layouts.basic')

@section('title', 'Pedido Produto')

@section('main')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Pedido - Adicionar Produtos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{route('ordered.create')}}">Voltar</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <h4>Detalhes do Pedido</h4>
            <p>ID do pedido: {{$ordered->id}}</p>
            <p>Cliente: {{$ordered->customer_id}}</p>
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                {{$msg ?? ''}}
                <h4>Itens do Pedido</h4>
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Produto</th>
                            <th>Data de criação do pedido</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ordered->products as $p)
                            <tr>
                                <td>{{$p->id}}</td>
                                <td>{{$p->name}}</td>
                                <td>{{$p->pivot->created_at->format('d/m/y')}}</td>
                                <td>
                                    <form action="{{route('ordered-product.destroy', ['ordered' => $ordered->id, 'product' => $p->id])}}" id="form_{{$ordered->id}}_{{$p->id}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{$ordered->id}}_{{$p->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @component('app.ordered_product._components.form_create', ['ordered' => $ordered, 'products' => $products])
                @endcomponent
            </div>
        </div>
    </div>
@endsection