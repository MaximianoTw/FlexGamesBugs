<x-master>

    <div class="container pt-5">

        @if(session()->has('mensagem'))
            <div class="alert alert-success">
                {{ session()->get('mensagem') }}
            </div>
        @endif

        <form action="/flexgames/{{ $flexgames->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" placeholder="Digite o título da notícia" class="form-control" value="{{ $flexgames->titulo }}">
            </div>

            <div class="form-group">
                <label for="conteudo">Conteúdo</label>
                <textarea name="conteudo" placeholder="Digite o conteúdo da notícia" class="form-control" rows="5">{{ $flexgames->conteudo }}</textarea>
            </div>

            <div class="form-group">
                <label for="imagem">Imagem Destaque</label>
                <input type="file" name="imagem"/>
                @if ($flexgames->imagem)
                    <img src="{{ $flexgames->imagem }}" alt="" height="100px" class="d-block">
                @endif
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control">
                    <option value="A" {{ $flexgames->status == "A" ? "selected='selected'" : "" }}>Aberto</option>
                    <option value="I" {{ $flexgames->status == "I" ? "selected='selected'" : "" }}>Corrigido</option>
                </select>
            </div>

            <div class="form-group">
                <label for="data_publicacao">Data da Publicação</label>
                <input type="text" name="data_publicacao" class="form-control" data-provide="datepicker" data-date-language="pt-BR" value="{{ optional($flexgames->data_publicacao)->format('d/m/Y') }}">
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="/flexgames" class="btn btn-primary">Voltar</a>

        </form>

        
    </div>

</x-master>