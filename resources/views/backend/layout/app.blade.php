<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    @include('backend.includes.meta')
    @include('backend.includes.style')
    @include('backend.includes.script')

    @if (app()->environment('local'))
        @vite([])
    @endif

    @livewireStyles
</head>

<body>
    @include('backend.includes.navbar')
    <!-- Page content -->
    <div class="page-content">
        @include('backend.includes.sidebar')
        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Inner content -->
            <div class="content-inner">

                @yield('content')
                
                {{ $slot ?? '' }}

                @include('backend.includes.footer')
            </div>
            <!-- /inner content -->
        </div>
        <!-- /main content -->
    </div>
    <!-- /page content -->
    @livewireScripts
</body>

</html>
