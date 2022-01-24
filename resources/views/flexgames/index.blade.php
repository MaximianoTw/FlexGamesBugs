<x-master title="Inserção">
    <div class="container mt-5">

        <a href="/flexgames/create" class="btn btn-primary mb-5">Criar Nova Notícia</a>

        @if(session()->has('mensagem'))
            <div class="alert alert-success">
                {{ session()->get('mensagem') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Ações</th>
                    <th>Título</th>
                    <th>Status</th>
                    <th>Data Publicação</th>
                    <th>Imagem</th>
                </tr>
            </thead>
            <tbody>
                @foreach($flexgames as $flexgame)
                    <tr>
                        <td style="width: 200px">
                            <a href="/flexgames/{{ $flexgame->id }}/edit" class="btn btn-primary btn-sm">Editar</a>
                            <form action="/flexgames/{{ $flexgame->id }}" method="POST" class="d-inline-block" onsubmit="confirmarExclusao(event)">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm" onsubmit="confirmarExclusao(event)">Excluir</button>
                            </form>
                        </td>
                        <td>{{ $flexgame->titulo }}</td>
                        <td>{{ $flexgame->status_formatado }}</td>
                        <td>{{ optional($flexgame->data_publicacao)->format("d/m/Y") }}</td>
                        <td><img src="{{ $flexgame->imagem }}" alt="" height="50px"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $flexgames -> links() }}

    </div>

</x-master>
