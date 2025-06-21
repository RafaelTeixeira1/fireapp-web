<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FireApp - Protegendo Vidas</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="flex items-center justify-between p-4 bg-white shadow">
        <div class="flex items-center">
            <img src="{{ asset('storage/photos/logo.png') }}" alt="FireApp" class="w-8 h-8 mr-2">
            <span class="font-bold text-lg text-red-600">FireApp</span>
        </div>
        <div class="space-x-3">
            <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 rounded text-sm">Login</a>
            <a href="{{ route('register') }}" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1.5 rounded text-sm">Cadastrar</a>
        </div>
    </nav>

    <!-- Hero -->
    <section 
        class="relative bg-cover bg-center min-h-[85vh] flex items-center justify-center text-center"
        style="background-image: url('{{ asset('storage/photos/fogo.jpg') }}');">
        <div class="absolute inset-0 bg-black bg-opacity-60"></div>
        <div class="relative z-10 text-white p-4">
            <h1 class="text-2xl md:text-4xl font-bold mb-4">Protegendo Vidas e o Meio Ambiente</h1>
            <p class="text-base md:text-lg mb-6">O FireApp é um sistema avançado de monitoramento e alerta de incêndios que ajuda a salvar vidas e preservar nosso meio ambiente.</p>
            <a href="{{ route('register') }}" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded transition text-sm">
                Começar Agora
            </a>
        </div>
    </section>

    <!-- Features -->
    <section class="max-w-7xl mx-auto py-10 px-4">
        <h2 class="text-xl md:text-2xl font-bold text-center mb-8">Como o FireApp pode ajudar?</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            
            <div class="bg-white rounded-lg shadow p-5 text-center">
                <div class="flex justify-center mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-black" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 22a2 2 0 0 0 2-2H10a2 2 0 0 0 2 2zm6-6V11a6 6 0 1 0-12 0v5l-2 2v1h16v-1l-2-2z"/>
                    </svg>
                </div>
                <h3 class="font-bold text-lg mb-1">Alerta Rápido</h3>
                <p class="text-gray-600 text-sm">Notificações em tempo real sobre incêndios próximos à sua localização.</p>
            </div>

            <div class="bg-white rounded-lg shadow p-5 text-center">
                <div class="flex justify-center mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-black" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2L2 7l10 5 10-5-10-5zm0 18l-10-5v-2l10 5 10-5v2l-10 5z"/>
                    </svg>
                </div>
                <h3 class="font-bold text-lg mb-1">Mapeamento Preciso</h3>
                <p class="text-gray-600 text-sm">Visualize áreas afetadas e rotas de fuga em um mapa interativo.</p>
            </div>

            <div class="bg-white rounded-lg shadow p-5 text-center">
                <div class="flex justify-center mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-black" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19 8h-1V6a4 4 0 1 0-8 0v2H5v14h14V8zm-6-2a2 2 0 1 1 4 0v2h-4V6zm-2 8h2v2h-2v-2zm0-4h2v2h-2v-2z"/>
                    </svg>
                </div>
                <h3 class="font-bold text-lg mb-1">Colaboração</h3>
                <p class="text-gray-600 text-sm">Comunidade engajada no combate e prevenção de incêndios.</p>
            </div>

        </div>
    </section>

</body>
</html>
