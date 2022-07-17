@if (isset($ordered->id))
    <form method="POST" action="{{route('ordered.update', ['ordered' => $ordered->id])}}">
        @csrf
        @method('PUT')
@else
    <form method="POST" action="{{route('ordered.store')}}">
        @csrf
@endif
        <select name="customer_id" id="">
            <option value="">Selecione um Fornecedor</option>
            @foreach ($customers as $c)
                <option value="{{$c->id}}" {{($ordered->customer_id ?? old('customer_id')) == $c->id ? 'selected' : ''}}>{{$c->name}}</option>
            @endforeach
        </select>
        {{$errors->has('customer_id') ? $errors->first('customer_id') : ''}}
{{--  
        <input type="text" name="name" value="{{$ordered->name ?? old('name')}}" class="borda-preta" placeholder="Nome do cliente">
        {{$errors->has('name') ? $errors->first('name') : ''}} --}}

        <button type="submit" class="borda-preta">Cadastrar</button>

    </form>