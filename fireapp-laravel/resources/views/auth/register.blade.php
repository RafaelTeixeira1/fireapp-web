<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nome Completo -->
        <div>
            <x-input-label for="name" :value="__('Nome Completo')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('E-mail')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Telefone -->
        <div class="mt-4">
            <x-input-label for="telefone" :value="__('Telefone')" />
            <x-text-input id="telefone" class="block mt-1 w-full" type="text" name="telefone" :value="old('telefone')" required autocomplete="tel" />
            <x-input-error :messages="$errors->get('telefone')" class="mt-2" />
        </div>

        <!-- Tipo de Usuário -->
        <div class="mt-4">
            <x-input-label for="tipo_usuario" :value="__('Tipo de Usuário')" />
            <select id="tipo_usuario" name="tipo_usuario" required
                class="block mt-1 w-full border-gray-300 focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm">
                <option value="">Selecione...</option>
                <option value="Cidadão" {{ old('tipo_usuario') == 'Cidadão' ? 'selected' : '' }}>Cidadão</option>
                <option value="Bombeiro" {{ old('tipo_usuario') == 'Bombeiro' ? 'selected' : '' }}>Bombeiro</option>
                <option value="Autoridade" {{ old('tipo_usuario') == 'Autoridade' ? 'selected' : '' }}>Autoridade</option>
            </select>
            <x-input-error :messages="$errors->get('tipo_usuario')" class="mt-2" />
        </div>

        <!-- Senha -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Senha')" />
            <x-text-input id="password" class="block mt-1 w-full"
                type="password"
                name="password"
                required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirmar Senha -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Senha')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                type="password"
                name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" href="{{ route('login') }}">
                {{ __('Já tem cadastro?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Criar Conta') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
