<x-layout title="Nova Série">

    <form action="{{ route('series.store') }}" method="post">
        @csrf
        <div class="pb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control mb-2">
            <button type="submit" class="btn btn-info">Adicionar</button>
        </div>
    </form>

</x-layout>
