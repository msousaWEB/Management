@if (isset($product_detail->id))
<form method="POST" action="{{route('product-detail.update', ['product_detail' => $product_detail->id])}}">
    @csrf
    @method('PUT')
@else
<form method="POST" action="{{route('product-detail.store')}}">
    @csrf
@endif
<select name="unit_id" id="">
    <option value="">Selecione a unidade de Medida</option>
    @foreach ($unit as $u)
        <option value="{{$u->id}}" {{($product_detail->unit_id ?? old('unit_id')) == $u->id ? 'selected' : ''}}>{{$u->description}}</option>
    @endforeach
</select>
{{$errors->has('unit_id') ? $errors->first('unit_id') : ''}}

<input type="text" name="product_id" value="{{$product_detail->product_id ?? old('product_id')}}" class="borda-preta" placeholder="ID do Produto">
{{$errors->has('product_id') ? $errors->first('product_id') : ''}}

<input type="text" name="length" value="{{$product_detail->length ?? old('length')}}" class="borda-preta" placeholder="Comprimento">
{{$errors->has('length') ? $errors->first('length') : ''}}

<input type="text" name="width" value="{{$product_detail->width ?? old('width')}}" class="borda-preta" placeholder="Largura">
{{$errors->has('width') ? $errors->first('width') : ''}}

<input type="text" name="height" value="{{$product_detail->height ?? old('height')}}" class="borda-preta" placeholder="Altura">
{{$errors->has('height') ? $errors->first('height') : ''}}

    <button type="submit" class="borda-preta">Cadastrar</button>
</form>