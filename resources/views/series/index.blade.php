@extends('layout')

@section('cabecalho')
    Séries
@endsection

@section('conteudo')

    @include('mensagem', ['mensagem' => $mensagem])
    @auth
        <a href="{{ route('form_criar_serie') }}" class="btn btn-primary mb-2">Adicionar Série</a>
    @endauth
    <div class="list-group">
        @foreach ($series as $serie)
            <div class="list-group-item d-flex align-items-center justify-content-between">
                <span id="nome-serie-{{ $serie->id }}">{{ $serie->nome }}</span>

                <div class="input-group w-50" hidden id="input-nome-serie-{{ $serie->id }}">
                    <input type="text" class="form-control" value="{{ $serie->nome }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" onclick="editarSerie({{ $serie->id }})">
                            <i class="bi bi-clipboard-check"></i>
                        </button>
                        @csrf
                    </div>

                </div>
                <span class="d-flex ">
                    @auth
                        <button class=" btn btn-primary m-1" onclick="toggleInput({{ $serie->id }})">
                            <i class="bi bi-pencil-square">
                            </i></button>
                    @endauth

                    <a href='/series/{{ $serie->id }}/temporadas' class="btn btn-primary m-1">
                        <i class="bi bi-box-arrow-up-right">
                        </i></a>
                    
                    @auth
                        <form method="post" action="/series/{{ $serie->id }}"
                            onsubmit="return confirm('Deseja apagar {{ $serie->nome }}\?')">
                            @csrf
                            @method("DELETE")
                            <button class='btn btn-danger m-1'><i class="bi bi-trash"></i></button>
                        </form>
                    @endauth
                </span>
            </div>
        @endforeach
    </div>
    <script>
        function toggleInput(serieId) {
            const inputSerie = document.querySelector(`#input-nome-serie-${serieId}`);
            inputSerie.hidden = !inputSerie.hidden;

            const nomeSerie = document.querySelector(`#nome-serie-${serieId}`);
            nomeSerie.hidden = !nomeSerie.hidden;

        }

        function editarSerie(serieId) {
            const nome = document.querySelector(`#input-nome-serie-${serieId} > input`).value;
            let formData = new FormData();

            const token = document.querySelector('input[name="_token"]').value;
            formData.append('nome', nome);
            formData.append('_token', token)

            const url = `/series/${serieId}/editName`;
            fetch(url, {
                body: formData,
                method: 'POST'
            }).then(() => {
                toggleInput(serieId)
                document.querySelector(`#nome-serie-${serieId}`).textContent = nome;
            });
        }
    </script>

@endsection
