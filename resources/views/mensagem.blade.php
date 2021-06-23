    @if (!empty($mensagem))
        <div role="alert" class="alert alert-success d-flex align-items-center">
            <h5 class="alert-heading">{{ $mensagem }}</h5>
        </div>
    @endif