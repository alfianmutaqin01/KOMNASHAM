@extends('backend.layout.app')
@section('content')
    @include('backend.includes.breadcrumb', [
        'title' => 'Dashboard',
        'subtitle' => 'Home',
    ])
    <!-- Content area -->
    <div class="content">

    </div>
    <!-- /content area -->
@endsection
{{-- <x-backend.layout.app>
    <h1>Ini dari slot</h1>
</x-backend.layout.app> --}}