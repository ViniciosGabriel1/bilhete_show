<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @livewireScripts

    <!-- Toastr JS -->
<!-- jQuery (necessário para Toastr) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
         toastr.options = {
        "closeButton": true,           // Exibe botão de fechar
        "progressBar": true,           // Barra de progresso
        "positionClass": "toast-top-right", // Posição da notificação
        "timeOut": "4000",             // Tempo de exibição (4s)
        "extendedTimeOut": "1000",     // Tempo extra ao passar o mouse
        "showMethod": "fadeIn",        // Animação ao mostrar
        "hideMethod": "fadeOut"        // Animação ao esconder
    };

    // Eventos para capturar mensagens do Livewire e exibir com Toastr
    window.addEventListener('toastr:success', event => {
        toastr.success(event.detail[0].message, "Sucesso 🎉");
    });

    window.addEventListener('toastr:error', event => {
        toastr.error(event.detail[0].message, "Erro ❌");
    });

    window.addEventListener('toastr:warning', event => {
        toastr.warning(event.detail[0].message, "Atenção ⚠️");
    });

    window.addEventListener('toastr:info', event => {
        toastr.info(event.detail[0].message, "Informação ℹ️");
    });
    </script>
    
</body>
</html>
