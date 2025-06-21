@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto bg-white shadow p-6 rounded">
    <h1 class="text-2xl font-bold mb-6">Bem-vindo ao FireApp</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <a href="{{ route('incendios.index') }}" class="block p-4 bg-gray-100 rounded hover:bg-gray-200 text-center">
            <h2 class="text-lg font-semibold">Incêndios</h2>
            <p class="text-sm text-gray-600">Visualizar e cadastrar incêndios</p>
        </a>

        <a href="{{ route('admin.dashboard') }}" class="block p-4 bg-gray-100 rounded hover:bg-gray-200 text-center">
            <h2 class="text-lg font-semibold">Painel ADM</h2>
            <p class="text-sm text-gray-600">Estatísticas e gestão</p>
        </a>

        <a href="{{ route('profile.edit') }}" class="block p-4 bg-gray-100 rounded hover:bg-gray-200 text-center">
            <h2 class="text-lg font-semibold">Perfil</h2>
            <p class="text-sm text-gray-600">Gerencie suas informações</p>
        </a>

        <a href="{{ route('profile.notifications') }}" class="block p-4 bg-gray-100 rounded hover:bg-gray-200 text-center">
            <h2 class="text-lg font-semibold">Notificações</h2>
            <p class="text-sm text-gray-600">Configure suas notificações</p>
        </a>

        <a href="{{ route('profile.privacy') }}" class="block p-4 bg-gray-100 rounded hover:bg-gray-200 text-center">
            <h2 class="text-lg font-semibold">Privacidade</h2>
            <p class="text-sm text-gray-600">Ajuste suas preferências de privacidade</p>
        </a>
    </div>
</div>
@endsection
