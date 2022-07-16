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
                <form method="POST" action="">
                    @csrf

                    <select name="unit_id" id="">
                        <option value="">Selecione a unidade de Medida</option>
                        @foreach ($unit as $u)
                            <option value="{{$u->id}}" {{($product->unit_id ?? old('unit_id')) == $u->id ? 'selected' : ''}}>{{$u->description}}</option>
                        @endforeach
                    </select>
                    {{$errors->has('unit_id') ? $errors->first('unit_id') : ''}}

                    <input type="text" name="name" value="{{$product->name ?? old('name')}}" class="borda-preta" placeholder="Nome">
                    {{$errors->has('name') ? $errors->first('name') : ''}}

                    <input type="text" name="description" value="{{$product->description ?? old('description')}}" class="borda-preta" placeholder="Descrição">
                    {{$errors->has('description') ? $errors->first('description') : ''}}

                    <input type="text" name="weight" value="{{$product->weight ?? old('weight')}}" class="borda-preta" placeholder="Peso">
                    {{$errors->has('weight') ? $errors->first('weight') : ''}}
                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection