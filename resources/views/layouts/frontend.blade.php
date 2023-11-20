<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @yield('title')

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}" type="image/x-icon">

    <!-- Icon Tabler -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800&family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css'])
</head>

<body class="bg-champagne text-black">
    @include('sweetalert::alert')
    @include('components.frontend.header')

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>


    @include('components.frontend.footer')

    @vite('resources/js/app.js')
    @stack('script')
</body>

</html>