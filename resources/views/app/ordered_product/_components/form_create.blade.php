<form method="POST" action="{{route('ordered-product.store', ['ordered' => $ordered])}}">
    @csrf
    <select name="product_id" id="">
        <option value="">Selecione um Produto</option>
        @foreach ($products as $p)
            <option value="{{$p->id}}" {{old('product_id') == $p->id ? 'selected' : ''}}>{{$p->name}}</option>
        @endforeach
    </select>
    {{$errors->has('product_id') ? $errors->first('product_id') : ''}}

    <input type="number" name="quantity" value="{{old('quantity') ? old('quantity') : ''}}" placeholder="Quantidade" class="borda-preta">
    {{$errors->has('quantity') ? $errors->first('quantity') : ''}}

    <button type="submit" class="borda-preta">Cadastrar</button>

</form>