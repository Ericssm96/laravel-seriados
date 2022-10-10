<form action="{{ $action }}" method="post">
    @csrf

    @if(isset($update) && $update === true)
        @method('put')
    @endif;

    <div class="pb-3">
        <label for="nome" class="form-label">Nome:</label>
        <input
            type="text"
            name="nome"
            id="nome"
            class="form-control mb-2"
            @isset($nome)
                value="{{$nome}}"
            @endisset
        >
        <button type="submit" class="btn btn-info">Adicionar</button>
    </div>
</form>
