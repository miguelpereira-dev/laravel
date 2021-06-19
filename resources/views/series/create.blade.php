@extends('layout')

@section('cabecalho')
    Adicionar série
@endsection

@section('conteudo')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post">
        @csrf
        <div class="form-group">
            <label for="nome" class="form-label">Nome da Série</label>
            <input type="text" placeholder="Nome da Série" class="form-control" id='nome' name='nome'>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Adicionar</button>
    </form>
@endsection
