<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NovaSerie extends Mailable
{
    use Queueable, SerializesModels;

    public string $nome;
    public int $qtdEpisodios;
    public int $qtdTemporadas;

    public function __construct(string $nome, int $qtdEpisodios, int $qtdTemporadas)
    {
        $this->nome = $nome;
        $this->qtdEpisodios = $qtdEpisodios;
        $this->qtdTemporadas = $qtdTemporadas;
    }

    public function build()
    {
        return $this->markdown('mail.serie.nova-serie');
    }
}
