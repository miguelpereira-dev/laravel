<?php

namespace App\Http\Controllers;

use App\Models\Episodio;
use App\Models\Temporada;
use Illuminate\Http\Request;

class EpisodiosController extends Controller
{
    public function index(Temporada $temporada, Request $request)
    {
        $episodios = $temporada->episodios;

        $mensagem = $request->session()->get('mensagem');
        return view('episodios.index', compact('episodios', 'temporada', 'mensagem'));
    }

    public function assistir(Temporada $temporada, Request $request)
    {
        $epAssistidos = $request->episodios;
        $temporada->episodios->each(function (Episodio $episodio) use ($epAssistidos) {
            $episodio->assistido = in_array($episodio->id, $epAssistidos);
        });
        $temporada->push();

        $request->session()->flash('mensagem', "Informações atualizadas!");
        return redirect()->back();
    }
}
