<h1>Detalhes da dúvida {{ $support->id }}</h1>

<ul>
    <li>Assunto: {{$support->subject}}</li>
    <li>Descrição: {{$support->body}}</li>
    <li>Status: {{$support->status}}</li>
    <li>
        <form action="{{ route('supports.destroy', $support->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">Deletar</button>
        </form>
    </li>
</ul>
