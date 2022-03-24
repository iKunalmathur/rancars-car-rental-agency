<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon"
        href="https://ui-avatars.com/api/?background=16a34a&color=000&length=1&name={{ config('app.name', 'Laravel') }}"
        type="image/x-icon">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- easy-alert-styles -->
    <link rel="stylesheet" href="{{ asset('css/easy-alert.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    {{-- livewire style --}}
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>

        <!-- easyAlert -->
        <x-easyAlert />
        <!-- /easyAlert -->

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    {{-- livewire script --}}
    @livewireScriptss
</body>

</html>