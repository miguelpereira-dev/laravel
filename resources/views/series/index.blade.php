@extends('layout')

@section('cabecalho')
    Séries
@endsection

@section('conteudo')

    @if (!empty($mensagem))
        <div role="alert" class="alert alert-success d-flex align-items-center">
            <h5 class="alert-heading">{{ $mensagem }}</h5>
        </div>
    @endif

    <a href="{{route('form_criar_serie')}}" class="btn btn-primary mb-2">Adicionar Série</a>

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex align-items-center justify-content-between">{{ $serie->nome }}
                <form method="post" action="/series/{{ $serie->id }}"
                    onsubmit="return confirm('Deseja apagar {{ $serie->nome }}\?')">

                    @csrf
                    @method("DELETE")
                    <button class='btn btn-danger'><i class="bi bi-trash"></i></button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
