@extends('layout')

@section('cabecalho')
Adicionar série
@endsection

@section('conteudo')
@include('errors', ['errors' => $errors])

@include('back-button')
<div class="bg-light p-3 rounded">
    <form method="post">
        @csrf
        <div class="row pb-2">
            <div class="col col-8">
                <label for="nome" class="form-label">Nome da Série</label>
                <input type="text" placeholder="Nome da Série" class="form-control" id='nome' name='nome'>
            </div>
            <div class="col col-2">
                <label for="qtd_temp" class="form-label">Temporadas</label>
                <input type="number" placeholder="Temporadas" class="form-control" id='qtd_temp' name='qtd_temp'>
            </div>
            <div class="col col-2">
                <label for="qtd_ep" class="form-label">Episódios </label>
                <input type="number" placeholder="Episódios" class="form-control" id='qtd_ep' name='qtd_ep'>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Adicionar</button>
    </form>
</div>
@endsection