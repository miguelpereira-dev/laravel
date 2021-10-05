<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Serie;
use App\Services\CriadorSeries;
use App\Services\RemovedorSeries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::query()->orderBy('nome')->get();
        $mensagem = $request->session()->get('mensagem');

        return view('series.index', compact('series', 'mensagem'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request, CriadorSeries $criadorSeries)
    {
        $serie = $criadorSeries->criarSeries($request);

        $email = new \App\Mail\NovaSerie(
            $request->nome,
            $request->qtd_temp,
            $request->qtd_ep
        );
        $email->subject = "Nova série criada";

        Mail::to($request->user())->send($email);

        $request->session()
            ->flash('mensagem', "Série {$serie->nome} [id: {$serie->id}] criada com sucesso! ");

        return redirect('/series');
    }

    public function destroy(Request $request, RemovedorSeries $removedor)
    {
        $serieNome = $removedor->remover($request->id);
        $request->session()
            ->flash('mensagem', "Série {$serieNome} removida com sucesso! ");

        return redirect('/series');
    }

    public function editaNome(int $id, Request $request)
    {
        $novoNome = $request->nome;
        $serie = Serie::find($id);
        $serie->nome = $novoNome;
        $serie->save();
    }
}
