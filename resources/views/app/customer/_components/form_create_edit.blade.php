@if (isset($customer->id))
    <form method="POST" action="{{route('customer.update', ['customer' => $customer->id])}}">
        @csrf
        @method('PUT')
@else
    <form method="POST" action="{{route('customer.store')}}">
        @csrf
@endif
        
        <input type="text" name="name" value="{{$customer->name ?? old('name')}}" class="borda-preta" placeholder="Nome do cliente">
        {{$errors->has('name') ? $errors->first('name') : ''}}

        <button type="submit" class="borda-preta">Cadastrar</button>

    </form>