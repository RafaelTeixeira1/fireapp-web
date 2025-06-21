@extends('layouts.app')

@section('content')

<!-- JSON seguro no HTML -->
<script type="application/json" id="incendios-json">
    {
        !!$incendios->map(function($i) {
            return [
                'area_poligono' => $i->area_poligono ? json_decode($i->area_poligono) : null,
            ];
        })->toJson(JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT)!!
    }
</script>

<x-voltar />

<div class="max-w-6xl mx-auto bg-white shadow p-6 rounded">

    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Incêndios Cadastrados</h1>
        <a href="{{ route('incendios.create') }}"
           class="inline-block bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded">
            Cadastrar Incêndio
        </a>
    </div>

    @if (session('success'))
    <div class="mb-4 text-green-600 font-semibold">
        {{ session('success') }}
    </div>
    @endif

    <!-- Painel estatísticas -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-4">
        <div class="bg-gray-100 p-4 rounded text-center">
            <div class="text-lg font-bold">{{ $incendios->count() }}</div>
            <div class="text-sm text-gray-600">Total</div>
        </div>
        <div class="bg-red-100 p-4 rounded text-center">
            <div class="text-lg font-bold">{{ $incendios->where('gravidade', 'Grave')->count() }}</div>
            <div class="text-sm text-red-600">Graves</div>
        </div>
        <div class="bg-yellow-100 p-4 rounded text-center">
            <div class="text-lg font-bold">{{ $incendios->where('gravidade', 'Médio')->count() }}</div>
            <div class="text-sm text-yellow-600">Médios</div>
        </div>
        <div class="bg-green-100 p-4 rounded text-center">
            <div class="text-lg font-bold">{{ $incendios->where('gravidade', 'Leve')->count() }}</div>
            <div class="text-sm text-green-600">Leves</div>
        </div>
    </div>

    <!-- Filtros -->
    <form method="GET" class="flex flex-wrap gap-2 mb-4">
        <input type="text" name="tipo" value="{{ request('tipo') }}" placeholder="Tipo" class="border rounded p-2">
        <input type="text" name="gravidade" value="{{ request('gravidade') }}" placeholder="Gravidade" class="border rounded p-2">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Filtrar</button>
        <a href="{{ route('incendios.index') }}" class="text-blue-600 underline ml-2">Limpar</a>
    </form>
    <button id="toggleView" style="background: #4B5563; color: white; padding: 8px 16px; border-radius: 6px; margin-bottom: 1rem;">
        Alternar Tabela/Mapa
    </button>

    <div id="incendiosTable">
        <table class="w-full border-collapse border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border p-2">Tipo</th>
                    <th class="border p-2">Gravidade</th>
                    <th class="border p-2">Descrição</th>
                    <th class="border p-2">Ponto Ref.</th>
                    <th class="border p-2">Data</th>
                    <th class="border p-2">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($incendios as $incendio)
                <tr>
                    <td class="border p-2">{{ $incendio->tipo }}</td>
                    <td class="border p-2">{{ $incendio->gravidade }}</td>
                    <td class="border p-2">{{ Str::limit($incendio->descricao, 50) }}</td>
                    <td class="border p-2">{{ $incendio->ponto_referencia }}</td>
                    <td class="border p-2">{{ $incendio->created_at->format('d/m/Y') }}</td>
                    <td class="border p-2">
                        <a href="{{ route('incendios.show', $incendio) }}" class="text-blue-600 hover:underline">Ver Mapa</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="p-4 text-center">Nenhum incêndio encontrado.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div id="incendiosMap" style="height: 400px; display: none;" class="rounded border"></div>
</div>
@endsection

@push('scripts')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
    const incendiosData = JSON.parse(document.getElementById('incendios-json').textContent);

    document.getElementById('toggleView').addEventListener('click', function() {
        const table = document.getElementById('incendiosTable');
        const mapDiv = document.getElementById('incendiosMap');

        if (table.style.display === 'none') {
            table.style.display = 'block';
            mapDiv.style.display = 'none';
        } else {
            table.style.display = 'none';
            mapDiv.style.display = 'block';

            if (!mapDiv.dataset.init) {
                const map = L.map('incendiosMap').setView([-15.78, -47.92], 4);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; OpenStreetMap contributors'
                }).addTo(map);

                incendiosData.forEach(function(incendio) {
                    if (incendio.area_poligono) {
                        L.polygon(incendio.area_poligono, {
                            color: 'red'
                        }).addTo(map);
                    }
                });

                mapDiv.dataset.init = true;
            }
        }
    });
</script>
@endpush
