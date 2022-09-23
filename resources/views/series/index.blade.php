<x-layout title="Series">
    <a href="/series/criar" class="btn btn-primary">Adicionar</a>
    <ul>
        @foreach ($series as $serie)
            <li>{{$serie}}</li>
        @endforeach
    </ul>
</x-layout>
