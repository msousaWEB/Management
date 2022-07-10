{{$slot}}
<form action={{route('site.contact')}} method="POST">
    @csrf
    <input name="name" value="{{old('name')}}" type="text" placeholder="Nome" class="{{$class}}">
    <br>
    <input name="tel" value="{{old('tel')}}" type="text" placeholder="Telefone" class="{{$class}}">
    <br>
    <input name="email" value="{{old('email')}}" type="text" placeholder="E-mail" class="{{$class}}">
    <br>
    <select name="reason_contact" class="{{$class}}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($reason_contacts as $key => $reason_contact)
            <option value="{{$reason_contact->id}}" {{ old('reason_contact') == $reason_contact->id ? 'selected' : ''}}>{{$reason_contact->reason_contact}}</option>
        @endforeach
    </select>
    <br>
    <textarea name="message" class="{{$class}}">{{(old('message') != '') ? old('message') : 'Preencha aqui a sua mensagem'}}</textarea>
    <br>
    <button type="submit" class="{{$class}}">ENVIAR</button>
</form>