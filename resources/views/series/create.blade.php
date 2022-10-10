<x-layout title="Nova Série">

    <form action="{{ route('series.store') }}" method="post">
        @csrf

        <div class="row mb-3">
            <div class="col-8">
                <label for="nome" class="form-label">Nome:</label>
                <input
                    autofocus
                    type="text"
                    name="nome"
                    id="nome"
                    class="form-control mb-2"
                >
            </div>

            <div class="col-2">
                <label for="seasonsQty" class="form-label">N° de temporadas:</label>
                <input
                    type="text"
                    name="seasonsQty"
                    id="seasonsQty"
                    class="form-control mb-2"
                >
            </div>

            <div class="col-2">
                <label for="episodesPerSeason" class="form-label">Ep / Temporada:</label>
                <input
                    type="text"
                    name="episodesPerSeason"
                    id="episodesPerSeason"
                    class="form-control mb-2"
                >
            </div>
        </div>

        <button type="submit" class="btn btn-info">Adicionar</button>
    </form>

</x-layout>
