<?php

namespace Tests\Unit;

use App\Models\Episodio;
use App\Models\Temporada;
use Tests\TestCase;

class TemporadaTest extends TestCase
{

    public function test_example()
    {
        $temporada = new Temporada();

        $ep1 = new Episodio();
        $ep1->assistido = true;
        $temporada->add($ep1);

        $ep2 = new Episodio();
        $ep2->assistido = false;
        $temporada->add($ep2);

        $ep3 = new Episodio();
        $ep3->assistido = true;
        $temporada->add($ep3);

        $epAssistidos = $temporada->epAssistidos();

        $this->assertCount(2, $epAssistidos);
        foreach ($epAssistidos as $epAssistido) {
            $this->assertTrue($epAssistido->assistido);
        }
    }
}
