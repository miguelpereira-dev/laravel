<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class TemporadasController extends Controller
{
    public function index(int $serie_id)
    {
        $temporadas = Serie::find($serie_id)->temporadas;
        $serie = Serie::find($serie_id)->nome;

        return view('temporadas.index', compact('temporadas', 'serie'));
    }
}
