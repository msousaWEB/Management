@if (isset($product->id))
    <form method="POST" action="{{route('product.update', ['product' => $product->id])}}">
        @csrf
        @method('PUT')
@else
    <form method="POST" action="{{route('product.store')}}">
        @csrf
@endif
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

        <select name="provider_id" id="">
            <option value="">Selecione um Fornecedor</option>
            @foreach ($providers as $p)
                <option value="{{$p->id}}" {{($product->provider_id ?? old('provider_id')) == $p->id ? 'selected' : ''}}>{{$p->name}}</option>
            @endforeach
        </select>
        {{$errors->has('provider_id') ? $errors->first('provider_id') : ''}}

        <button type="submit" class="borda-preta">Cadastrar</button>

    </form>