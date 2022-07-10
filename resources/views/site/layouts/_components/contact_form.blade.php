{{$slot}}
<form action={{route('site.contact')}} method="POST">
    @csrf
    <input name="name" value="{{old('name')}}" type="text" placeholder="Nome" class="{{$class}}">
    {{$errors->has('name') ? $errors->first('name') : ''}}
    <br>
    <input name="tel" value="{{old('tel')}}" type="text" placeholder="Telefone" class="{{$class}}">
    {{$errors->has('tel') ? $errors->first('tel') : ''}}
    <br>
    <input name="email" value="{{old('email')}}" type="text" placeholder="E-mail" class="{{$class}}">
    {{$errors->has('email') ? $errors->first('email') : ''}}
    <br>
    <select name="reason_contacts_id" class="{{$class}}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($reason_contacts as $key => $reason_contact)
            <option value="{{$reason_contact->id}}" {{ old('reason_contacts_id') == $reason_contact->id ? 'selected' : ''}}>{{$reason_contact->reason_contact}}</option>
        @endforeach
    </select>
    {{$errors->has('reason_contacts_id') ? $errors->first('reason_contacts_id') : ''}}
    <br>
    <textarea name="message" class="{{$class}}">{{(old('message') != '') ? old('message') : 'Preencha aqui a sua mensagem'}}</textarea>
    {{$errors->has('message') ? $errors->first('message') : ''}}
    <br>
    <button type="submit" class="{{$class}}">ENVIAR</button>
</form>

{{-- @if ($errors->any())
    <div style="position:absolute; top:0px; width:100%;">
        @foreach ($errors->all() as $e)
            {{$e}}
            <br>
        @endforeach
    </div>
@endif --}}