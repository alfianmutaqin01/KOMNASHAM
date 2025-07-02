<!-- resources/views/components/app-layout.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? config('app.name', 'Dashboard') }}</title>

    {{-- Styles & Scripts --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100 text-gray-800">

    {{-- Navbar --}}
    @include('layouts.partials.navbar')

    <div class="min-h-screen">

        {{-- Header (dari slot) --}}
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        {{-- Main Content --}}
        <main class="py-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>

        {{-- Footer --}}
        @include('layouts.partials.footer')
    </div>

    {{-- Scripts --}}
    @livewireScripts
    @stack('scripts')

</body>
</html>
