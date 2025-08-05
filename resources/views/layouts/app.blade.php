<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Chartered Insights - Professional Chartered Accountancy Services')</title>
    <meta name="description" content="@yield('meta_description', 'Leading Chartered Accountancy firm in Nepal providing comprehensive audit, tax, risk advisory, and business consulting services.')">

    <!-- Favicons -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!-- Google Fonts - Montserrat for headings, Lato for body -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Lato:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>

<body class="font-lato text-report-black bg-crisp-white">
    @include('partials.navigation')
    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    @stack('scripts')
    @stack('scripts')
</body>

</html>
