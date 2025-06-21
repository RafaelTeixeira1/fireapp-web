@extends('layouts.app')

@section('content')

<x-voltar />

<div class="max-w-4xl mx-auto bg-white shadow p-6 rounded">
    <h1 class="text-xl font-bold mb-6 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 1.75l7.5 4.33v8.67L12 22.25l-7.5-4.5V6.08L12 1.75m0-1.75L3 5.5v9l9 5.25 9-5.25v-9L12 0z"/>
        </svg>
        Privacidade
    </h1>

    @if (session('status'))
    <div class="mb-4 text-green-600 font-semibold">
        {{ session('status') }}
    </div>
    @endif

    <form method="POST" action="{{ route('profile.privacy.update') }}">
        @csrf

        <div class="space-y-4 mb-6">
            <div class="flex justify-between items-center">
                <span>Tornar meu perfil público</span>
                <input type="checkbox" name="perfil_publico" value="1"
                       class="toggle-checkbox"
                       {{ $user->perfil_publico ? 'checked' : '' }}>
            </div>

            <div class="flex justify-between items-center">
                <span>Compartilhar localização</span>
                <input type="checkbox" name="compartilha_localizacao" value="1"
                       class="toggle-checkbox"
                       {{ $user->compartilha_localizacao ? 'checked' : '' }}>
            </div>
        </div>

        <div class="flex gap-4 mt-6">
            <button type="submit" name="reset" value="1" class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-2 px-4 rounded">
                Restaurar Padrões
            </button>
            <button type="submit" class="flex-1 bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded">
                Salvar Alterações
            </button>
        </div>
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
