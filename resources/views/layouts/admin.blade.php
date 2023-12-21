<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
{{-- <html lang="en"> --}}

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{-- Title --}}
    @yield('title')

    @include('components.admin.style')

    @vite('resources/css/app.css')

    <!--- Tambahkan setelah app.js --->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>

<body>
    @include('sweetalert::alert')

    <div class="flex h-screen bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">

        {{-- Sidebar --}}
        @include('components.admin.sidebar')
        <div class="flex flex-col flex-1 w-full">

            {{-- Navbar --}}
            @include('components.admin.navbar')

            <main class="h-full overflow-y-auto">
                <div class="container grid px-6 mx-auto">
                    @yield('title-page')
                    {{-- Content --}}
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
    @include('components.admin.script')

    <!--- Tambahkan setelah script --->
    @stack('script')
</body>

</html>