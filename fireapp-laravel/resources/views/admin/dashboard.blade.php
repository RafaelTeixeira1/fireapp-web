@extends('layouts.app')

@section('content')

<x-voltar />
<div class="max-w-7xl mx-auto bg-white shadow p-6 rounded">
    <h1 class="text-xl font-bold mb-4">Painel Administrativo</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <div class="p-4 bg-gray-100 rounded">
            <p class="text-sm">Total de Incêndios</p>
            <p class="text-2xl font-bold">{{ $total }}</p>
        </div>
        <div class="p-4 bg-red-100 rounded">
            <p class="text-sm">Incêndios Graves</p>
            <p class="text-2xl font-bold">{{ $graves }}</p>
        </div>
    </div>

    <form method="GET" class="mb-4 flex flex-wrap gap-4">
        <input type="text" name="tipo" placeholder="Filtrar por tipo" value="{{ request('tipo') }}" class="border rounded p-2">
        <input type="text" name="gravidade" placeholder="Filtrar por gravidade" value="{{ request('gravidade') }}" class="border rounded p-2">
        <button type="submit" style="background: gray; color: white; border: 2px solid white; padding: 10px 20px; font-size: 18px; z-index: 1000; position: relative; border-radius: 6px;">Filtrar</button>
    </form>

    <table class="w-full border">
        <thead class="bg-gray-200">
            <tr>
                <th class="border p-2">Tipo</th>
                <th class="border p-2">Gravidade</th>
                <th class="border p-2">Descrição</th>
                <th class="border p-2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($incendios as $incendio)
                <tr>
                    <td class="border p-2">{{ $incendio->tipo }}</td>
                    <td class="border p-2">{{ $incendio->gravidade }}</td>
                    <td class="border p-2">{{ Str::limit($incendio->descricao, 50) }}</td>
                    <td class="border p-2">
                        <a href="{{ route('incendios.show', $incendio) }}" class="text-blue-600 hover:underline">Ver</a>
                        <a href="{{ route('incendios.edit', $incendio) }}" class="text-yellow-600 hover:underline ml-2">Editar</a>
                        <form action="{{ route('incendios.destroy', $incendio) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline ml-2" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="p-4 text-center">Nenhum incêndio encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $incendios->links() }}
    </div>
</div>
@endsection
