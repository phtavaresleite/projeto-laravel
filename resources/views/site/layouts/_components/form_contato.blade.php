{{ $slot }}
<form action="{{ route('site.contato') }}" method="post">
@csrf
    <input name="nome" value="{{old('nome')}}" type="text" placeholder="Nome" class="{{$classe}}">
    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
    <br>
    <input name="telefone" value="{{old('telefone')}}" type="text" placeholder="Telefone" class="{{$classe}}">
    {{ $errors->has('telefone') ? $errors->first('telefone') : '' }}
    <br>
    <input name="email" value="{{old('email')}}" type="text" placeholder="E-mail" class="{{$classe}}">
    {{ $errors->has('email') ? $errors->first('email') : '' }}
    <br>
    <select name="motivo_contato_id" class="{{$classe}}">
        <option value="">Qual o motivo do contato?</option>
        
        @foreach ($motivos_contato as $key => $motivo)
        <option value="{{$motivo->id}}" {{ old('motivo_contato_id') == $motivo->id ? 'selected' : '' }}>{{$motivo->motivo_contato}}</option>
        @endforeach
    </select>
    {{ $errors->has('motivo_contato_id') ? $errors->first('motivo_contato_id') : '' }}
    <br>
    <textarea name="mensagem" class="{{$classe}}" placeholder='Preencha aqui a sua mensagem'>@if (old('mensagem') != ''){{old('mensagem')}}@endif</textarea>
    {{ $errors->has('mensagem') ? $errors->first('mensagem') : '' }}
    <br>
    <button type="submit" class="{{$classe}}">ENVIAR</button>
</form>

@if($errors->any())
    <div style="position:absolute; top:0px; left: 0px; width: 100%">
        <pre>
        @foreach ($errors->all() as $error)
            {{print_r($error)}}
            <br>
        @endforeach
        </pre>
    </div>
@endif