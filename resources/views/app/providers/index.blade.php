<h3>Provider</h3>

{{-- Comentário --}}


@foreach ($providers as $p)
    Provider: {{$p['name']}} <br>
    Status: {{$p['status']}} <br>
    Cnpj: {{$p['cnpj']}} <br> 
    <hr>
@endforeach
