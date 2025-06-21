@extends('layouts.app')

@section('content')
<x-voltar />

<div class="max-w-5xl mx-auto bg-white shadow p-6 rounded mb-32">
    <h1 class="text-2xl font-bold text-center text-red-500 mb-2">Cadastro de Incêndio</h1>
    <p class="text-center text-gray-500 mb-6">Ajude-nos a identificar e combater incêndios em áreas rurais</p>

    @if ($errors->any())
    <div class="mb-4 text-red-600">
        <ul class="list-disc pl-4">
            @foreach ($errors->all() as $erro)
            <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('incendios.store') }}" class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @csrf

        <div class="space-y-4">
            <div>
                <label class="block font-semibold mb-1">Tipo de Incêndio</label>
                <select name="tipo" required class="w-full border rounded p-2 border-red-500">
                    <option value="">Selecione o tipo...</option>
                    <option value="Florestal">Florestal</option>
                    <option value="Agrícola">Agrícola</option>
                    <option value="Residencial">Residencial</option>
                </select>
            </div>

            <div>
                <label class="block font-semibold mb-1">Gravidade do Incêndio</label>
                <div class="flex gap-2">
                    <div class="flex-1">
                        <input type="radio" name="gravidade" value="Baixa" id="gravidade-baixa" class="hidden peer">
                        <label for="gravidade-baixa" class="block border rounded p-2 text-center cursor-pointer hover:bg-gray-100 hover:border-gray-400 peer-checked:bg-red-500 peer-checked:text-white peer-checked:border-red-500">
                            Baixa
                        </label>
                    </div>
                    <div class="flex-1">
                        <input type="radio" name="gravidade" value="Média" id="gravidade-media" class="hidden peer">
                        <label for="gravidade-media" class="block border rounded p-2 text-center cursor-pointer hover:bg-gray-100 hover:border-gray-400 peer-checked:bg-red-500 peer-checked:text-white peer-checked:border-red-500">
                            Média
                        </label>
                    </div>
                    <div class="flex-1">
                        <input type="radio" name="gravidade" value="Alta" id="gravidade-alta" class="hidden peer">
                        <label for="gravidade-alta" class="block border rounded p-2 text-center cursor-pointer hover:bg-gray-100 hover:border-gray-400 peer-checked:bg-red-500 peer-checked:text-white peer-checked:border-red-500">
                            Alta
                        </label>
                    </div>
                </div>
            </div>

            <div>
                <label class="block font-semibold mb-1">Descrição</label>
                <textarea name="descricao" required class="w-full border rounded p-2" placeholder="Descreva detalhes importantes sobre o incêndio..."></textarea>
            </div>

            <div>
                <label class="block font-semibold mb-1">Ponto de Referência</label>
                <input type="text" name="ponto_referencia" class="w-full border rounded p-2" placeholder="Ex: Próximo à Fazenda São João">
            </div>
        </div>

        <div class="space-y-4">
            <label class="block font-semibold mb-1">Localização do Incêndio</label>
            <div class="flex gap-2 mb-2">
                <button type="button" id="drawArea" class="bg-blue-900 hover:bg-blue-800 text-white px-4 py-2 rounded">Desenhar Área</button>
                <button type="button" id="clearMap" class="bg-blue-900 hover:bg-blue-800 text-white px-4 py-2 rounded">Limpar</button>
            </div>
            <input type="hidden" name="area_poligono" id="area_poligono">
            <div id="map" class="rounded border" style="height: 400px;"></div>
        </div>

        <div class="md:col-span-2 flex justify-end mt-4">
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-6 rounded">
                Salvar Incêndio
            </button>
        </div>
    </form>
</div>

@push('scripts')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-draw@1.0.4/dist/leaflet.draw.css" />
<script src="https://cdn.jsdelivr.net/npm/leaflet-draw@1.0.4/dist/leaflet.draw.js"></script>

<script>
    const map = L.map('map').setView([-15.7801, -47.9292], 6);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    const drawnItems = new L.FeatureGroup();
    map.addLayer(drawnItems);

    const drawControl = new L.Control.Draw({
        draw: {
            polygon: {
                allowIntersection: false,
                showArea: true,
                drawError: {
                    color: 'red',
                    message: '<strong>Erro:</strong> Polígonos não podem se cruzar!'
                },
                shapeOptions: {
                    color: '#e74c3c'
                }
            },
            polyline: false,
            rectangle: false,
            circle: false,
            marker: false,
            circlemarker: false
        },
        edit: {
            featureGroup: drawnItems
        }
    });

    document.getElementById('drawArea').addEventListener('click', function() {
        map.addControl(drawControl);
    });

    document.getElementById('clearMap').addEventListener('click', function() {
        drawnItems.clearLayers();
        document.getElementById('area_poligono').value = '';
    });

    map.on(L.Draw.Event.CREATED, function(e) {
        drawnItems.clearLayers();
        const layer = e.layer;
        drawnItems.addLayer(layer);

        const coords = layer.getLatLngs()[0].map(p => [p.lat, p.lng]);
        document.getElementById('area_poligono').value = JSON.stringify(coords);
    });
</script>
@endpush
@endsection
