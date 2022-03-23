<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | Car Rental Agency</title>

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
</head>

<body>
    <!-- easyAlert -->
    <x-easyAlert />
    <!-- /easyAlert -->
    <div class="font-sans text-gray-900 antialiased ">
        {{ $slot }}
    </div>
</body>

</html>