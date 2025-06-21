@extends('layouts.app')

@section('content')

<div class="flex justify-start mb-4">
    <x-voltar />
</div>
<div class="max-w-4xl mx-auto bg-white shadow p-6 rounded">
    <h1 class="text-xl font-bold mb-4">Atualizar Perfil</h1>

    @if (session('status'))
    <div class="mb-4 text-green-600 font-semibold">
        {{ session('status') }}
    </div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PATCH')

        <div>
            <label class="block font-semibold">Nome:</label>
            <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" class="w-full border rounded p-2">
        </div>

        <div>
            <label class="block font-semibold">E-mail:</label>
            <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" class="w-full border rounded p-2">
        </div>

        <div>
            <label class="block font-semibold">Telefone:</label>
            <input type="text" name="telefone" value="{{ old('telefone', auth()->user()->telefone) }}" class="w-full border rounded p-2">
        </div>

        <div>
            <label class="block font-semibold">Foto de perfil:</label>

            <input type="file" name="foto" class="w-full border rounded p-2">
        </div>

        <button type="submit" style="background: #16a34a; color: white; padding: 8px 16px; border-radius: 6px; border: 1px solid #0f5132;">
            Salvar Alterações
        </button>
    </form>
</div>
@endsection