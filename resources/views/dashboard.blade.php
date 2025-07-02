<!DOCTYPE html>
<html lang="id" dir="ltr">
<head>
    @include('layouts.partials.head') {{-- Meta, title, CSS Limitless, dll --}}

    @if (app()->environment('local'))
        @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- Hanya saat development --}}
    @endif

    @livewireStyles
</head>
<body>

    {{-- Navbar --}}
    @include('layouts.partials.navbar')

    <div class="page-content">

        {{-- Sidebar (kondisional) --}}
        @unless (isset($hideSidebar))
            @include('layouts.partials.sidebar')
        @endunless

        <div class="content-wrapper">
            <div class="content-inner">

                {{-- Page Header --}}
                @include('layouts.partials.page_header')

                {{-- Konten halaman --}}
                <div class="content">
                    @yield('content')
                </div>

                {{-- Footer --}}
                @include('layouts.partials.footer')

            </div>
        </div>

    </div>

    @livewireScripts
    @stack('scripts')
</body>
</html>
