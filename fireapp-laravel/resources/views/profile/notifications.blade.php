@extends('layouts.app')

@section('content')

<x-voltar />

<div class="max-w-4xl mx-auto bg-white shadow p-6 rounded">
    <h1 class="text-xl font-bold mb-6 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 22a2 2 0 0 0 2-2H10a2 2 0 0 0 2 2zm6-6V11a6 6 0 1 0-12 0v5l-2 2v1h16v-1l-2-2z"/>
        </svg>
        Notificações
    </h1>

    @if (session('status'))
    <div class="mb-4 text-green-600 font-semibold">
        {{ session('status') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="mb-4 text-red-600">
        <ul class="list-disc pl-4">
            @foreach ($errors->all() as $erro)
            <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('profile.notifications.update') }}">
        @csrf

        @php
        $metodos = json_decode($user->notificacoes ?? '[]', true);
        @endphp

        <div class="space-y-4 mb-6">
            <div class="flex justify-between items-center">
                <span>Receber notificações push</span>
                <input type="checkbox" name="notificacoes[]" value="push" 
                       class="toggle-checkbox" 
                       {{ in_array('push', $metodos) ? 'checked' : '' }}>
            </div>
            <div class="flex justify-between items-center">
                <span>Notificações por e-mail</span>
                <input type="checkbox" name="notificacoes[]" value="email" 
                       class="toggle-checkbox" 
                       {{ in_array('email', $metodos) ? 'checked' : '' }}>
            </div>
            <div class="flex justify-between items-center">
                <span>Notificações por SMS</span>
                <input type="checkbox" name="notificacoes[]" value="sms" 
                       class="toggle-checkbox" 
                       {{ in_array('sms', $metodos) ? 'checked' : '' }}>
            </div>
        </div>

        <div class="mb-6">
            <label class="block font-semibold mb-1">Raio de notificação (km):</label>
            <input type="range" name="raio_alerta" min="1" max="100" 
                   value="{{ old('raio_alerta', $user->raio_alerta ?? 10) }}" 
                   class="w-full accent-blue-600"
                   oninput="document.getElementById('raioValor').innerText = this.value + ' km';">
            <div class="text-right text-sm text-red-600">
                <span id="raioValor">{{ old('raio_alerta', $user->raio_alerta ?? 10) }} km</span>
            </div>
        </div>

        <div class="mb-6">
            <label class="block font-semibold mb-2">Horários preferenciais para notificações</label>
            <div class="flex flex-wrap gap-2">
                @php
                    $hora_inicio = $user->hora_inicio;
                    $hora_fim = $user->hora_fim;
                @endphp
                <label class="border rounded p-2 cursor-pointer">
                    <input type="radio" name="periodo" value="manha"
                        {{ ($hora_inicio == '06:00' && $hora_fim == '12:00') ? 'checked' : '' }}> Manhã 6h - 12h
                </label>
                <label class="border rounded p-2 cursor-pointer">
                    <input type="radio" name="periodo" value="tarde"
                        {{ ($hora_inicio == '12:00' && $hora_fim == '18:00') ? 'checked' : '' }}> Tarde 12h - 18h
                </label>
                <label class="border rounded p-2 cursor-pointer">
                    <input type="radio" name="periodo" value="noite"
                        {{ ($hora_inicio == '18:00' && $hora_fim == '00:00') ? 'checked' : '' }}> Noite 18h - 0h
                </label>
                <label class="border rounded p-2 cursor-pointer">
                    <input type="radio" name="periodo" value="madrugada"
                        {{ ($hora_inicio == '00:00' && $hora_fim == '06:00') ? 'checked' : '' }}> Madrugada 0h - 6h
                </label>
            </div>
        </div>

        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded">
            Salvar Alterações
        </button>
    </form>
</div>

<style>
    .toggle-checkbox {
        position: relative;
        width: 3rem;
        height: 1.5rem;
        -webkit-appearance: none;
        background: #d1d5db;
        outline: none;
        border-radius: 9999px;
        transition: background 0.3s;
        cursor: pointer;
    }
    .toggle-checkbox:checked {
        background: #ef4444;
    }
    .toggle-checkbox::before {
        content: '';
        position: absolute;
        width: 1.25rem;
        height: 1.25rem;
        border-radius: 50%;
        top: 0.125rem;
        left: 0.125rem;
        background: #fff;
        transition: transform 0.3s;
    }
    .toggle-checkbox:checked::before {
        transform: translateX(1.5rem);
    }
</style>

@endsection
