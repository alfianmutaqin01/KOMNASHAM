<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Dashboard' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- atau sesuaikan asset kamu --}}
    @livewireStyles
</head>
<body>

    <main class="py-4 container">
        {{ $slot }}
    </main>

    @livewireScripts
</body>
</html>
