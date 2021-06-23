<?php

namespace App\Services;

use App\Models\Episodio;
use App\Models\Serie;
use App\Models\Temporada;
use Illuminate\Support\Facades\DB;

class RemovedorSeries
{
    static public function remover(int $serieId): string
    {
        DB::beginTransaction();

        $serie = Serie::find($serieId);
        $serieNome = $serie->nome;
        $serie->temporadas->each(function (Temporada $temporada) {
            $temporada->episodios->each(function (Episodio $episodio) {
                $episodio->delete();
            });
            $temporada->delete();
        });
        $serie->delete();

        DB::commit();
        return $serieNome;
    }
}
