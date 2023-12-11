<h1>Nova Dúvida</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('supports.store') }}" method="post">
    @csrf
    <input type="text" name="subject" id="" placeholder="Assunto" value="{{ old('subject') }}">
    <textarea name="body" id="" cols="30" rows="5" placeholder="Descrição">
        {{ old('body') }}
    </textarea>
    <button type="submit">Enviar</button>
</form>
