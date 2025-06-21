@extends('layouts.app')

@section('content')

<!-- JSON seguro no HTML -->
<script type="application/json" id="incendio-json">
    {!! json_encode(json_decode($incendio->area_poligono), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>

<div class="max-w-4xl mx-auto bg-white shadow p-6 rounded">
    <h1 class="text-xl font-bold mb-4">Área do Incêndio</h1>

    <div id="map" style="height: 400px;" class="rounded border"></div>

    <a href="{{ route('incendios.index') }}" class="mt-4 inline-block bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">Voltar</a>
</div>
@endsection

@push('scripts')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
    const coords = JSON.parse(document.getElementById('incendio-json').textContent);

    const map = L.map('map').setView([-15.78, -47.92], 5);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    if (coords) {
        const polygon = L.polygon(coords, { color: 'red' }).addTo(map);
        map.fitBounds(polygon.getBounds());
    } else {
        alert("Polígono não disponível para este incêndio.");
    }
</script>
@endpush
