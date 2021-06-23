<?php

namespace App\Services;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Serie;
use Illuminate\Support\Facades\DB;

class CriadorSeries
{
    public function criarSeries(SeriesFormRequest $request): Serie
    {
        DB::beginTransaction();

        $serie = Serie::create(['nome' => $request->nome]);
        $qtdTemp = $request->qtd_temp;

        for ($i = 1; $i <= $qtdTemp; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);

            for ($j = 1; $j <= $request->qtd_ep; $j++) {
                $temporada->episodios()->create(['numero' => $j]);
            }
        }
        
        DB::commit();
        return $serie;
    }
}
