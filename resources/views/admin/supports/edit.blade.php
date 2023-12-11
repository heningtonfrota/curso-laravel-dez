<h1>Editar Dúvida {{ $support->id }}</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('supports.update', $support->id) }}" method="post">
    @method('PUT')
    @csrf
    <input value="{{ $support->subject }}" type="text" name="subject" id="" placeholder="Assunto">
    <textarea name="body" id="" cols="30" rows="5" placeholder="Descrição">
        {{ $support->body }}
    </textarea>
    <button type="submit">Enviar</button>
</form>
