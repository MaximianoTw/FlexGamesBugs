<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Flexgames;
use App\Http\Requests\FlexgamesRequest;
use App\Services\UploadService;
use Carbon\Carbon;

class FlexgamesController extends Controller
{
    public function index()
    {
        return view('flexgames.index', [
            'flexgames' => Flexgames::where('status', Flexgames::STATUS_ATIVO)->paginate(10)
        ]);
    }

    public function create()
    {
        return view('flexgames.create');
    }
    
    public function edit($flexgames)
    {
        $flexgames = Flexgames::findOrFail($flexgames);
        
        return view('flexgames.edit', [
            'flexgames' => $flexgames
        ]);
    }

    public function store(FlexgamesRequest $request)
    {
        $dados = $request->all();
        $dados['imagem']->storeAs('public', $dados['imagem']->getClientOriginalName());
        $dados['imagem'] = '/storage/' . $dados['imagem']->getClientOriginalName();
    
        Flexgames::create($dados);
    
        return redirect()->back()->with('mensagem', 'Notícia criada com sucesso!');
    }

    public function update($flexgames, FlexgamesRequest $request) 
    {
        $flexgames = Flexgames::find($flexgames);

        $dados = $request->all();
        if ($request->imagem) {
            $dados['imagem'] = UploadService::upload($dados['imagem']);
        }
        
        $flexgames->update($dados);

        return redirect()->back()->with('mensagem', 'Publicação atualizada com sucesso!');
    }

    public function destroy($flexgames)
    {
        $flexgames = Flexgames::findOrFail($flexgames);
        $flexgames->delete();

        return redirect('/flexgames')->with('mensagem', 'Registro excluído com sucesso!');
    }

    public static function upload($arquivo)
    {
        $arquivo->storeAs('public', $arquivo->getClientOriginalName());
        return '/storage/' . $arquivo->getClientOriginalName();
    }
}
