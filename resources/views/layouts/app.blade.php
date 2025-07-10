<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <script src="https://d3js.org/d3.v7.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles

    @stack('styles')
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts

    @stack('scripts')

    {{-- Pindahkan script yang mendengarkan event Livewire ke sini, setelah @livewireScripts --}}
    {{-- atau lebih baik, bungkus dalam @push('scripts') di komponen Livewire Anda --}}
    <script>
        // Gunakan Livewire.on() untuk Livewire 3
        Livewire.on('open-pdf', function ({ url }) {
            const link = document.createElement('a');
            link.href = url;
            link.download = ''; // Biarkan kosong agar browser menanyakan atau membuka di tab baru
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        });

        // Untuk skenario D3.js, event livewire:navigated lebih relevan jika Anda menggunakan wire:navigate
        // document.addEventListener('livewire:navigated', function () {
        //     // Panggil fungsi inisialisasi D3.js di sini jika Anda tidak menggunakan @script
        //     // Ini akan memastikan chart di-render ulang setelah navigasi Livewire
        //     // (Tetapi @script di komponen Livewire adalah pendekatan yang lebih baik untuk chart D3.js)
        // });
    </script>
</body>

</html>