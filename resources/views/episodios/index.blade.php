@extends('layout')


@section('cabecalho')
    Episodios da temporada {{ $temporada->numero }}
@endsection

@section('conteudo')

    @include('mensagem', ['mensagem' => $mensagem])
    @include('back-button')
    <form action="/temporadas/{{ $temporada->id }}/episodios/assistir" method="post">
        @csrf
        <div class="list-group">
            @foreach ($episodios as $episodio)
                <div class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">
                    <span>Episódio {{ $episodio->numero }}</span>

                    <input autocomplete="off" value="{{ $episodio->id }}" {{ $episodio->assistido ? 'checked' : '' }}
                        class="btn-check" type="checkbox" id="check-{{ $episodio->id }}" name="episodios[]">
                    <label class="btn btn-outline-primary" for="check-{{ $episodio->id }}">
                        Assistido
                    </label>


                </div>
            @endforeach
        </div>
        <button type='submit' class="btn btn-success mt-3 mb-3">Salvar</button>
    </form>
@endsection
