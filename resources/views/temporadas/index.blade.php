@extends('layout')


@section('cabecalho')
    Temporadas de {{ $serie }}
@endsection

@section('conteudo')
    <div class="list-group">
        @foreach ($temporadas as $temporada)
            <a href='/temporadas/{{ $temporada->id }}/episodios'
                class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">
                <span>Temporada {{ $temporada->numero }}</span>
                <p class="badge rounded-pill m-0 bg-primary">{{ $temporada->epAssistidos()->count() }} /
                    {{ $temporada->episodios->count() }}</p>
            </a>
        @endforeach
    </div>
@endsection
