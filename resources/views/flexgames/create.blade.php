<x-master>

    <div class="container pt-5">
        @if(session()->has('mensagem'))
            <div class="alert alert-success">
                {{ session()->get('mensagem') }}
            </div>
        @endif
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <p><strong>Erro ao realizar essa operação</strong></p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/flexgames" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" placeholder="Digite o título da notícia" class="form-control">
            </div>

            <div class="form-group">
                <label for="conteudo">Conteúdo</label>
                <textarea name="conteudo" placeholder="Digite o conteúdo da notícia" class="form-control" rows="5"></textarea>
            </div>

            <div class="form-group">
                <label for="imagem">Imagem Destaque</label>
                <input type="file" name="imagem"/>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control">
                    <option value="A">Aberto</option>
                    <option value="I">Corrigido</option>
                </select>
            </div>

            <div class="form-group">
                <label for="data_publicacao">Data da Publicação</label>
                <input type="text" name="data_publicacao" placeholder="Dia/Mês/Ano" class="form-control" data-provide="datepicker" data-date-language="pt-BR">
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="/flexgames" class="btn btn-primary">Voltar</a>


        </form>
    </div>
</x-master>
<br>
<br>
<br>
<br>

<?php
    use Illuminate\Support\Carbon;

    $saoPaulo = Carbon::now(new DateTimeZone('America/Sao_Paulo'));

    print('São Paulo - ' . $saoPaulo); echo '<br/>';

    $d = Carbon::now();
    print($d->toTimeString());
?>