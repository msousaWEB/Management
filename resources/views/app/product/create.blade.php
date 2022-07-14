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
                <form method="POST" action="{{route('product.store')}}">
                    @csrf

                    <select name="unit_id" id="">
                        <option value="">Selecione a unidade de Medida</option>
                        @foreach ($unit as $u)
                            <option value="{{$u->id}}">{{$u->description}}</option>
                        @endforeach
                    </select>

                    <input type="text" name="name" value="" class="borda-preta" placeholder="Nome">

                    <input type="text" name="description" value="" class="borda-preta" placeholder="Descrição">

                    <input type="text" name="weight" value="" class="borda-preta" placeholder="Peso">

                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection