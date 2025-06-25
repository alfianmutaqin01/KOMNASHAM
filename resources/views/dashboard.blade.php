<!DOCTYPE html>
<html lang="id" dir="ltr">

<head>
    @include('layouts.partials.head') {{-- Mengimpor semua tag head --}}
    @if (app()->environment('local'))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    @livewireStyles
</head>

<body>

    @include('layouts.partials.navbar') {{-- Mengimpor Navbar --}}

    <div class="page-content">

        @include('layouts.partials.sidebar') {{-- Mengimpor Sidebar --}}

        <div class="content-wrapper">

            <div class="content-inner">

                @include('layouts.partials.page_header') {{-- Mengimpor Page Header --}}

                {{-- Area konten utama yang akan diisi oleh halaman spesifik atau Livewire Page Component --}}
                <div class="content">
                    @yield('content')
                </div>

                @include('layouts.partials.footer') {{-- Mengimpor Footer dan Offcanvas --}}

            </div>

        </div>

    </div>

    @livewireScripts
    @stack('scripts')
</body>
</html>