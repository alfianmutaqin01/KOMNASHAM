<!DOCTYPE html>
<html lang="id" dir="ltr">

<head>
    @include('layouts.partials.head') 
    @if (app()->environment('local'))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    @livewireStyles
</head>

<body>

    @include('layouts.partials.navbar') 

    <div class="page-content">

        @include('layouts.partials.sidebar')

        <div class="content-wrapper">

            <div class="content-inner">

                @include('layouts.partials.page_header') 

                <div class="content">
                    @yield('content')
                </div>
                @include('layouts.partials.footer') 

            </div>

        </div>

    </div>

    @livewireScripts
    @stack('scripts')
    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('open-pdf', (event) => {
                if (event.url) {
                    window.open(event.url, '_blank'); 
                }
            });
        });
        document.addEventListener('livewire:navigated', function () { // Atau 'DOMContentLoaded' jika ini bukan komponen halaman
        window.addEventListener('open-pdf', event => {
            if (event.detail.url) {
                window.open(event.detail.url, '_blank');
            }
        });
    });

    </script>
</body>

</html>