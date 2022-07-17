<div class="topo">

    <div class="logo">
        <a href="{{route('app.home')}}"><img src="{{asset('img/logo.png')}}"></a>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('app.home') }}">Home</a></li>
            <li><a href="{{ route('customer.index') }}">Clientes</a></li>
            <li><a href="{{ route('ordered.index') }}">Pedidos</a></li>
            <li><a href="{{ route('app.provider') }}">Fornecedores</a></li>
            <li><a href="{{ route('product.index') }}">Produtos</a></li>
            <li><a href="{{ route('app.quit') }}">Sair</a></li>
        </ul>
    </div>
</div>